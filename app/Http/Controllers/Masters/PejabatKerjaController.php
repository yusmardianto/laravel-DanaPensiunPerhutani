<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterPejabatKerja;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator, Auth;

class PejabatKerjaController extends Controller
{
    public function index()
    {
        return view('masters.pejabat-kerja.index');
    }

    public function ajaxList()
    {
        $data = MasterPejabatKerja::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/pejabat-kerja/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/pejabat-kerja/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->nama_voucher ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.pejabat-kerja.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kode_pejabat_kerja' => 'required|unique:master_pejabat_kerjas,kode_pejabat_kerja',
        ];

        $messages = [
            'kode_pejabat_kerja.unique' => 'Kode Pejabat Kerja sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterPejabatKerja();
            $data->kode_pejabat_kerja = $request->kode_pejabat_kerja;
            $data->nama_pejabat_kerja = $request->nama_pejabat_kerja;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/pejabat-kerja')->with('success', 'Berhasil menambah Voucher '.$request->kode_pejabat_kerja);
        }
    }

    public function getDetail($id)
    {
        $data = MasterPejabatKerja::find($id);
        if(isset($data))
        {
            return view('masters.pejabat-kerja.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterPejabatKerja::find($id);
        if(isset($data))
        {
            return view('masters.pejabat-kerja.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterPejabatKerja::find($id);
        if(isset($data))
        {
            $data->kode_pejabat_kerja = $request->kode_pejabat_kerja;
            $data->nama_pejabat_kerja = $request->nama_pejabat_kerja;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/pejabat-kerja')->with('success', 'Berhasil mengubah Data Pejabat Kerja '.$request->kode_pejabat_kerja);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Data Pejabat Kerja '.$data->kode_pejabat_kerja);
        }
    }

    public function destroy($id)
    {
        $data = MasterPejabatKerja::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Pejabat Kerja '.$data->kode_pejabat_kerja);
        }
        else
        {
            return redirect()->back()->with('error', 'Pejabat Kerja tidak ditemukan');
        }
    }
}
