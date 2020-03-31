<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB, DataTables, Hasher, Auth, Validator;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('config.user.index');
    }

    public function ajaxList(Request $request)
    {
        $data = User::with('roles')
            ->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('config/user/show/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('config/user/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->addColumn('roles', function ($row) {
                $string = "";
                foreach($row->roles as $item) {
                    $string .= "<label class=\"badge badge-success\">".$item->name."</label> &nbsp;";
                }
                return $string;
            })
            ->rawColumns(['action', 'roles'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        $user = Auth::user();

        if ($user->hasRole('Supervisor')) {
            $roles = Role::all();
        }else {
            $roles = Role::where('name', '!=', 'Supervisor')->get();
        }

        return view('config.user.create', compact('roles'));
    }

    public function postCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'roles' => 'required',
            'password' => 'nullable|min:8|same:confirm-password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            if ($user->save()) {
                $user->assignRole($request->roles);
                return redirect('config/user')->with('success', 'Berhasil menginput data pengguna '. $request->name .'');
            }
            else {
                return redirect('config/user')->with('error', 'Gagal menginput data pengguna '. $request->name .'')->withInput();
            }
        }
    }

}
