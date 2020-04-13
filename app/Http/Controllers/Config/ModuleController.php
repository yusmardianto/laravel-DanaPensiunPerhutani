<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config\Module;
use App\Models\Permission;
use DB, DataTables, Hasher;

class ModuleController extends Controller
{

    function __construct()
    {
        //  $this->middleware('permission:module-list');
        //  $this->middleware('permission:module-create', ['only' => ['getCreate','postCreate']]);
        //  $this->middleware('permission:module-update', ['only' => ['getUpdate','postUpdate']]);
        //  $this->middleware('permission:module-delete', ['only' => ['postDelete']]);
        //  $this->middleware('permission:module-create-permission', ['only' => ['getAddPermission','postAddPermission']]);
        //  $this->middleware('permission:module-delete-permission', ['only' => ['postDeletePermission']]);
    }

    public function index(Request $request)
    {
        return view('config.module.index');
    }

    public function ajaxList(Request $request)
    {
        $data = Module::select([
            'id',
            'name',
            'detail',
        ])->orderBy('created_at', 'DESC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('config/module/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('config/module/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('config.module.create');
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:roles,name',
            'detail' => 'required|max:200',
        ]);

        $module = new Module();
        $module->name = $request->nama;
        $module->detail = $request->detail;
        if ($module->save()) {
            return redirect('config/module')->with('success','Berhasil menambah data module '.$request->name.'');
        }
        return redirect()->back()->with('error', 'Gagal menambah data module '. $request->name .'')->withInput();
    }

    public function getDetail($id)
    {
        $data = Module::with('permissions')->find($id);
        $hashed_id = Hasher::encode($data->id);

        return view('config.module.detail',compact('data', 'hashed_id'));
    }

    public function ajaxPermission(Request $request, $id)
    {
        $data = Permission::select([
            'id',
            'name',
            'guard_name',
        ])->where('module_id', $id)->orderBy('created_at', 'ASC');

        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getAddPermission($id)
    {
        $module = Module::find($id);

        if (isset($module)) {
            return view('config.module.addPermissions', compact('module'));
        }
        return redirect()->back()->with('error', 'data tidak ditemukan')->withInput();
    }

    public function postAddPermission(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|unique:roles,name',
            'platform' => 'required',
        ]);

        $hashed_id = Hasher::encode($id);

        $permission = new Permission();
        $permission->name = $request->nama;
        $permission->guard_name = $request->platform;
        $permission->module_id = $id;
        if ($permission->save()) {
            return redirect('config/module/detail/'.$hashed_id.'')->with('success', 'Berhasil menambah data permissions '.$request->name.'');
        }
        return redirect()->back()->with('error', 'Gagal menambah data permissions'. $request->name .'')->withInput();
    }

    public function postDeletePermission($id, $permissionId)
    {
        $permission = Permission::where('module_id', $id)->where('id', Hasher::encode($permissionId))->first();

        $hashed_id = Hasher::encode($id);
        if ((isset($permission)) && ($permission->delete())) {
            return redirect('config/module/detail/'.$hashed_id.'')->with('success', 'Berhasil menghapus data permissions '.$permission->name.'');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan')->withInput();
    }

    public function getEdit($id)
    {
        $module = Module::find($id);

        if (isset($module)) {
            return view('config.module.edit',compact('module'));
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan')->withInput();
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|unique:roles,name',
            'detail' => 'required|max:200',
        ]);

        $module = Module::find($id);
        $module->name = $request->nama;
        $module->detail = $request->detail;

        if ($module->save()) {
            return redirect('config/module')->with('success','Berhasil mengubah data module '.$request->name.'');
        }
        return redirect()->back()->with('error', 'Gagal mengubah data module '. $request->name .'')->withInput();
    }

    public function delete($id)
    {
        $module = Module::with('permissions')->find($id);

        if ((isset($module)) && ($module->delete())) {
            return redirect('config/module')->with('success','Berhasil menghapus data module '.$module->name.'');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data module '. $module->name .'')->withInput();
    }
}
