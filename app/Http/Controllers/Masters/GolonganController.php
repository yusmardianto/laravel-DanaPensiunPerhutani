<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterGolongan;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator, Auth;

class GolonganController extends Controller
{
    public function index()
    {
        return view('masters.golongan.index');
    }

    public function ajaxList()
    {
        $data = MasterGolongan::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/golongan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/golongan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->addColumn('gapok', function($row) {
                return 'Rp '. number_format($row->gajipokok, 2, ",", '.');
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.golongan.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required|unique:master_golongans,name,NULL,id,keterangan,'.$request->keterangan,
        ];

        $messages = [
            'name.unique' => 'Golongan tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $auth = Auth::user();

            $data = new MasterGolongan();
            $data->name = $request->name;
            $data->gajipokok = str_replace(".", "", $request->gajipokok);
            $data->keterangan = $request->keterangan;
            $data->created_by = $auth->id;

            if(isset($data))
            {
                $data->save();
                return redirect('masters/golongan')->with('success', 'Berhasil menambah Golongan '.$data->name);
            }
        }
    }

    public function getDetail($id)
    {
        $data = MasterGolongan::find($id);
        if(isset($data))
        {
            return view('masters.golongan.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterGolongan::find($id);
        if(isset($data))
        {
            return view('masters.golongan.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $auth = Auth::user();

        $data = MasterGolongan::find($id);
        $data->name = $request->name;
        $data->gajipokok = str_replace(".", "", $request->gajipokok);
        $data->keterangan = $request->keterangan;
        $data->created_by = $auth->id;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/golongan')->with('success', 'Berhasil menambah Golongan '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Golongan '.$data->name)->withInput();
        }
    }

    public function destroy($id)
    {
        $data = MasterGolongan::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Data Golongan '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Data Golongan '.$data->name);
        }
    }
}
