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

    public function index()
    {
        $user = Auth::user();
        return view('config.user.index', compact('user'));
    }

    public function ajaxList(Request $request)
    {
        $data = User::with('roles')
            ->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('config/user/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
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
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|min:10|unique:users,no_hp',
            'roles' => 'required',
            'password' => 'required|min:8|same:confirm-password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->no_hp = $request->no_hp;
            $user->is_active = 1;
            $user->password = Hash::make($request->password);

            if ($user->save()) {
                $user->assignRole($request->roles);

                return redirect('config/user')->with('success', 'Berhasil menambah data pengguna '. $request->name .'');
            }
            else {

                return redirect('config/user')->with('error', 'Gagal menambah data pengguna '. $request->name .'')->withInput();
            }
        }
    }

    public function getDetail($id)
    {
        $user = User::find($id);

        if (isset($user)) {
            $hashed_id = Hasher::encode($user->id);
            return view('config.user.detail', compact('user', 'hashed_id'));
        }
        return redirect('config/user')->with('error', 'Data tidak ditemukan')->withInput();
    }

    public function ajaxRole($id)
    {
        $data = Role::whereHas('users', function($q) use($id) {
            $q->where('id', $id);
        })
        ->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('permissions', function ($row) {
            $string = "";
            foreach($row->permissions as $item) {
                $string.= "<label class=\"badge badge-success\">".$item->name."</label> &nbsp;";
            }
            return $string;
        })

        ->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->username ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['permissions', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getAddRole($id)
    {
        $user = User::find($id);

        if (isset($user)) {
            $roles = Role::all();

            $arrayRole = array();
            foreach($user->roles as $row) {
                $arrayRole[] = $row->id;
            }

            return view('config.user.addRole', compact('user', 'roles', 'arrayRole'));
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan')->withInput();
    }

    public function postAddRole(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'roles' => 'required'
        ]);

        $hashed_id = Hasher::encode($id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::find($id);

            if ($user->save()) {
                DB::table('model_has_roles')->where('model_id',$user->id)->delete();
                $user->assignRole($request->roles);

                return redirect('config/user/detail/'.$hashed_id.'')->with('success', 'Berhasil menambah / mengubah tipe pengguna untuk user ini');
            }
        }
        return redirect('config/user')->with('error', 'data tidak ditemukan')->withInput();
    }

    public function postDeleteRole($id, $roleId)
    {
        $user = DB::table('model_has_roles')->where('model_id', $id)->where('role_id', Hasher::decode($roleId));

        $hashed_id = Hasher::encode($id);
        if (isset($user)){
            $user->delete();
            return redirect('config/user/detail/'.$hashed_id.'')->with('success','Berhasil menghapus data role pengguna');
        }
        return redirect()->back()->with('error', 'data tidak ditemukan');
    }

    public function getEdit($id)
    {
        $user = User::find($id);

        if (isset($user)) {
            $roles = Role::all();

            $arrayRole = array();
            foreach($user->roles as $row) {
                $arrayRole[] = $row->id;
            }

            return view('config.user.edit',compact('user','roles','arrayRole'));
        }

        return redirect('config/user')->with('error', 'Data tidak ditemukan')->withInput();
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'no_hp' => 'required|min:10|unique:users,no_hp,'.$id,
            'roles' => 'required',
            'password' => 'required|min:8|same:confirm-password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::find($id);

            if (isset($user)) {
                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->no_hp = $request->no_hp;
                $user->is_active = ($request->status) ? 1 : 0;
                $user->password = Hash::make($request->password);

                if ($user->save()) {
                    DB::table('model_has_roles')->where('model_id',$user->id)->delete();
                    $user->assignRole($request->roles);

                    return redirect('config/user')->with('success', 'Berhasil mengubah data pengguna '. $request->name .'');
                }
                return redirect()->back()->with('error', 'Gagal mengubah data pengguna '. $request->name .'')->withInput();
            }
        }
        return redirect('config/user')->with('error', 'data tidak ditemukan')->withInput();
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user_name = $user->name;
        if((Auth::user()->id == $id)) {
            return redirect('config/user')->with('error', 'Anda tidak dapat menghapus diri sendiri')->withInput();
        }elseif ((isset($user)) && ($user->delete())) {
            return redirect('config/user')->with('success','Berhasil menghapus data pengguna '. $user_name .'');
        }

        return redirect('config/user')->with('error', 'Data tidak ditemukan')->withInput();
    }
}
