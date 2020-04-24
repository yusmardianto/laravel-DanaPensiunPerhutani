<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterPeriode;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator, Auth;

class PeriodeController extends Controller
{
    public function index()
    {
        return view('masters.periode.index');
    }

    public function ajaxList()
    {
        $data = MasterPeriode::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/periode/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/periode/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->periode ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.periode.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'periode' => 'required|unique:master_periodes,periode',
        ];

        $messages = [
            'periode.unique' => 'Periode sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterPeriode();
            $data->periode = $request->periode;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/periode')->with('success', 'Berhasil menambah Periode '.$request->kode_pejabat_kerja);
        }
    }

    public function getDetail($id)
    {
        $data = MasterPeriode::find($id);
        if(isset($data))
        {
            return view('masters.periode.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterPeriode::find($id);
        if(isset($data))
        {
            return view('masters.periode.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterPeriode::find($id);
        if(isset($data))
        {
            $data->periode = $request->periode;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/periode')->with('success', 'Berhasil mengubah Data Periode '.$request->periode);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Data Periode '.$data->periode);
        }
    }

    public function destroy($id)
    {
        $data = MasterPeriode::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Data Periode '.$data->periode);
        }
        else
        {
            return redirect()->back()->with('error', 'Periode tidak ditemukan');
        }
    }
}
