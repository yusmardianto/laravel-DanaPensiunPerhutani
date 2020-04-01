<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB, DataTables, Hasher, Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('config.role.index');
    }

    public function ajaxList(Request $request)
    {
        $data = Role::select([
            'id',
            'name',
            'guard_name',
        ])->orderBy('created_at', 'ASC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('config/role/show/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('config/role/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        $permission = Permission::orderBy('name', 'ASC')->get();
        return view('config.role.create', compact('permission'));
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        if ($role = Role::create(['name' => $request->input('nama')])) {
            $role->syncPermissions($request->input('permission'));

        return redirect('config/role')->with('success','Berhasil menambah data Role '.$role->name.'');
        }
        else {

            return redirect('config/role')->with('error','Gagal menambah data Role '.$role->name.'')->withInput();
        }
    }
}
