<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\PejabatKerja;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class PejabatKerjaController extends Controller
{
    public function index()
    {
        return view('masters.pejabat-kerja.index');
    }

    public function getCreate()
    {
        return view('masters.pejabat-kerja.create');
    }

    public function ajaxList()
    {
        $data = PejabatKerja::whereNotNull('created_at');
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
            'kode_pejabat_kerja' => 'required|unique:master_pejabat_kerjas,kode_pejabat_kerja',
        ];

        $messages = [
            'kode_pejabat_kerja.unique' => 'Kode Pejabat Kerja tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new PejabatKerja();
        $data->kode_pejabat_kerja = $request->kode_pejabat_kerja;
        $data->nama_pejabat_kerja = $request->nama_pejabat_kerja;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/pejabat-kerja')->with('success', 'Berhasil menambah Unit Kerja'.$data->name);
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
