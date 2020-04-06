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
        // $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('config.role.index', compact ('user'));
    }

    public function ajaxList(Request $request)
    {
        $data = Role::select([
            'id',
            'name',
            'guard_name',
        ])->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('config/role/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
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

        return redirect('config/role')->with('success','Berhasil menambah data role '.$role->name .'');
        }
        else {
            return redirect('config/role')->with('error','Gagal menambah data role '.$role->name .'')->withInput();
        }
    }

    public function getDetail($id)
    {
        $id = Hasher::decode($id);
        $role = Role::find($id);
        $hashed_id = Hasher::decode($role->id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('config.role.detail',compact('role', 'rolePermissions', 'hashed_id'));
    }

    public function ajaxUser(Request $request, $id)
    {
        $data = User::whereHas('roles', function ($q) use ($id) {
            $q->where('id', $id);
        })->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->username ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getEdit($id)
    {
        $id = Hasher::decode($id);
        $role = Role::find($id);

        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->toArray();

        return view('config.role.edit',compact('role','permission','rolePermissions'));
    }

    public function postEdit(Request $request, $id)
    {
        $id = Hasher::decode($id);
        $role = Role::find($id);

        $this->validate($request, [
            'nama' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);

        $role->name = $request->input('nama');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect('config/role')->with('success','Berhasil mengubah data role '.$role->name .'');
    }

    public function delete($id)
    {
        $id = Hasher::decode($id);
        $role = Role::find($id);

        DB::table("roles")->where('id',$id)->delete();
        return redirect('config/role')->with('success','Berhasil menghapus data role '.$role->name .'');
    }
}
