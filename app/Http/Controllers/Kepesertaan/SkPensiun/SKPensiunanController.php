<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\SkPensiun\SkPensiun;
use App\Models\Masters\MasterPeriode;
use App\Models\Masters\MasterVoucher;
use App\Models\Masters\MasterUnitKerja;
use App\Models\Kepesertaan\Kepesertaan;
use DataTables, Hasher, Validator;

class SKPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.skpensiunan.transaksiskpensiun.index');
    }

    public function getCreate(Request $request)
    {
        $periode = MasterPeriode::all();
        $voucher = MasterVoucher::all();
        $unit_kerja = MasterUnitKerja::all();
        $kodeaktif = Kepesertaan::all();
        return view('kepesertaan.skpensiunan.transaksiskpensiun.create', compact('kodeaktif','periode','voucher','unit_kerja'));
    }

    public function ajaxList()
    {
        $data = SkPensiun::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/transaksiskpensiun/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/transaksiskpensiun/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->no_sk_pensiun ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'no_trx_sk' => 'required|unique:sk_pensiuns,no_trx_sk',
        ];

        $messages = [
            'no_trx_sk.unique' => 'Nomer Transaksi SK Pensiun tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new SkPensiun();
        $data->jenis_transaksi = $request->jenis_transaksi;
        $data->kode_pasif = $request->kode_aktif;
        $data->voucher = $request->voucher;
        $data->unit_kerja = $request->unit_kerja;
        $data->tanggal_pensiun = $request->tanggal_pensiun;
        $data->no_trx_sk = $request->no_trx_sk;
        $data->tgl_trx_sk = $request->tgl_trx_sk;
        $data->no_sk_pensiun = $request->no_sk_pensiun;
        $data->tgl_sk_pensiun = $request->tgl_sk_pensiun;
        $data->no_sk_phk = $request->no_sk_phk;
        $data->tgl_sk_phk = $request->tgl_sk_phk;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil menambah SK Pensiunan '.$data->no_sk_pensiun);
        }
    }

    public function getDetail($id)
    {
        $periode = MasterPeriode::all();
        $voucher = MasterVoucher::all();
        $unit_kerja = MasterUnitKerja::all();
        $kodeaktif = Kepesertaan::all();
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.transaksiskpensiun.detail', compact('kodeaktif','data','periode','voucher','unit_kerja'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $periode = MasterPeriode::all();
        $voucher = MasterVoucher::all();
        $unit_kerja = MasterUnitKerja::all();
        $kodeaktif = Kepesertaan::all();
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.transaksiskpensiun.edit', compact('kodeaktif','data','periode','voucher','unit_kerja'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = SkPensiun::find($id);

        $rules = [
            'no_trx_sk' => 'required|unique:sk_pensiuns,no_trx_sk,'.$id,
        ];

        $messages = [
            'no_trx_sk.unique' => 'Nomer Transaksi SK Pensiun tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data->jenis_transaksi = $request->jenis_transaksi;
            $data->kode_pasif = $request->kode_aktif;
            $data->voucher = $request->voucher;
            $data->unit_kerja = $request->unit_kerja;
            $data->tanggal_pensiun = $request->tanggal_pensiun;
            $data->no_trx_sk = $request->no_trx_sk;
            $data->tgl_trx_sk = $request->tgl_trx_sk;
            $data->no_sk_pensiun = $request->no_sk_pensiun;
            $data->tgl_sk_pensiun = $request->tgl_sk_pensiun;
            $data->no_sk_phk = $request->no_sk_phk;
            $data->tgl_sk_phk = $request->tgl_sk_phk;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil mengubah SK Pensiun '.$data->no_sk_pensiun);
        }
    }

    public function destroy($id)
    {
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return redirect()->back()->with('success', 'Berhasil menghapus SK Pensiunan '.$data->no_sk_pensiun);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus SK Pensiunan');
        }
    }
}