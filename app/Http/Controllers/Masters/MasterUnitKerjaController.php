<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterUnitKerja;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class MasterUnitKerjaController extends Controller
{
    public function index()
    {
        return view('masters.unit-kerja.index');
    }

    public function ajaxList(Request $request)
    {
        $data = MasterUnitKerja::whereNotNull('created_at')
        ->orderBy('created_at', 'DESC');
        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/unit-kerja/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/unit-kerja/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.unit-kerja.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kd_unit' => 'required|unique:master_unit_kerjas,kd_unit',
            'name' => 'required|unique:master_unit_kerjas,name',
        ];

        $messages = [
            'kd_unit.unique' => 'Kode Unit Kerja sudah terdaftar.',
            'name.unique' => 'Nama Unit Kerja sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterUnitKerja();
            $data->kd_unit = $request->kd_unit;
            $data->name = $request->name;
            $data->pejabat = $request->pejabat;
            $data->alamat1 = $request->alamat1;
            $data->alamat2 = $request->alamat2;
            $data->kota = $request->kota;
            $data->kd_pos = $request->kd_pos;
            $data->provinsi = $request->provinsi;
            $data->telepon = $request->telepon;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/unit-kerja')->with('success', 'Berhasil menambah data unit kerja '.$request->name);
        }
    }

    public function getDetail($id)
    {
        $data = MasterUnitKerja::find($id);
        if(isset($data))
        {
            return view('masters.unit-kerja.detail', compact ('data'));
        }
        else
        {
            return redircet()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterUnitKerja::find($id);
        if(isset($data))
        {
            return view('masters.unit-kerja.edit', compact ('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterUnitKerja::find($id);
        if(isset($data))
        {
            $data->kd_unit = $request->kd_unit;
            $data->name = $request->name;
            $data->pejabat = $request->pejabat;
            $data->alamat1 = $request->alamat1;
            $data->alamat2 = $request->alamat2;
            $data->kota = $request->kota;
            $data->kd_pos = $request->kd_pos;
            $data->provinsi = $request->provinsi;
            $data->telepon = $request->telepon;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/unit-kerja')->with('success', 'Berhasil mengubah data unit kerja '.$request->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah data '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = MasterUnitKerja::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect('masters/unit-kerja')->with('success', 'Berhasil menghapus data unit kerja '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
