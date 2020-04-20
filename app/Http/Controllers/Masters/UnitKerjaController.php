<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\UnitKerja;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class UnitKerjaController extends Controller
{
    public function index()
    {
        return view('masters.unit-kerja.index');
    }

    public function getCreate()
    {
        return view('masters.unit-kerja.create');
    }

    public function ajaxList()
    {
        $data = UnitKerja::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Edit</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {

        $rules = [
            'kode_unit_kerja' => 'required|unique:master_unit_kerjas,kode_unit_kerja',
        ];

        $messages = [
            'kode_unit_kerja.unique' => 'Kode Unit Kerja tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new UnitKerja();
        $data->kode_unit_kerja = $request->kode_unit_kerja;
        $data->nama_unit_kerja = $request->nama_unit_kerja;
        $data->pejabat = $request->pejabat;
        $data->alamat = $request->alamat;
        $data->kota = $request->kota;
        $data->kode_pos = $request->kode_pos;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/unit-kerja')->with('success', 'Berhasil menambah Unit Kerja'.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = Voucher::find($id);
        if(isset($data))
        {

            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Unit Kerja '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Unit Kerja');
        }
    }
}
