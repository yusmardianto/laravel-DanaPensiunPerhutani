<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\SkPensiun\PenetapanPenerimaMP;
use App\Models\Kepesertaan\Kepesertaan;
use App\Models\Regencies;
use DataTables, Hasher, Validator;

class PenetapanPenerimaMPController extends Controller
{
    public function getCreate(Request $request)
    {
        $regencies = Regencies::all();
        $kodeaktif = Kepesertaan::all();
        return view('kepesertaan.skpensiunan.penerimamanfaat.create', compact('kodeaktif','regencies'));
    }

    public function ajaxList()
    {
        $data = PenetapanPenerimaMP::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/penerimamanfaat/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/penerimamanfaat/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->penerima ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {
        $data = new PenetapanPenerimaMP();
        $data->kode_aktif = $request->kode_aktif;
        $data->penerima = $request->penerima;
        $data->no_kk = $request->no_kk;
        $data->tgl_kk = $request->tgl_kk;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat_tinggal = $request->alamat_tinggal;
        $data->kota_tinggal = $request->kota_tinggal;
        $data->pos_tinggal = $request->pos_tinggal;
        $data->alamat_domisili = $request->alamat_domisili;
        $data->kota_domisili = $request->kota_domisili;
        $data->pos_domisili = $request->pos_domisili;
        $data->nik = $request->nik;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil menambah Penerima Manfaat Pensiunan '.$data->penerima);
        }
    }

    public function getDetail($id)
    {
        $regencies = Regencies::all();
        $kodeaktif = Kepesertaan::all();
        $data = PenetapanPenerimaMP::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.penerimamanfaat.detail', compact('kodeaktif','regencies'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Penerima Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $regencies = Regencies::all();
        $kodeaktif = Kepesertaan::all();
        $data = PenetapanPenerimaMP::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.penerimamanfaat.edit', compact('data','kodeaktif','regencies'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Penerima Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = PenetapanPenerimaMP::find($id);
        $data->kode_aktif = $request->kode_aktif;
        $data->penerima = $request->penerima;
        $data->no_kk = $request->no_kk;
        $data->tgl_kk = $request->tgl_kk;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->alamat_tinggal = $request->alamat_tinggal;
        $data->kota_tinggal = $request->kota_tinggal;
        $data->pos_tinggal = $request->pos_tinggal;
        $data->alamat_domisili = $request->alamat_domisili;
        $data->kota_domisili = $request->kota_domisili;
        $data->pos_domisili = $request->pos_domisili;
        $data->nik = $request->nik;
        $data->keterangan = $request->keterangan;


        $data->save();
        return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil mengubah Penerima Manfaat Pensiunan '.$data->penerima);
    }


    public function destroy($id)
    {
        $data = PenetapanPenerimaMP::find($id);
        if(isset($data))
        {
            return redirect()->back()->with('success', 'Berhasil menghapus Penerima Manfaat Pensiunan '.$data->penerima);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Penerima Manfaat Pensiunan');
        }
    }
}
