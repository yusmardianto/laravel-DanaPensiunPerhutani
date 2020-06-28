<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\SkPensiun\PenetapanSKMP;
use App\Models\Masters\MasterAlasanPensiun;
use App\Models\Masters\MasterUnitPembayaran;
use App\Models\Kepesertaan\Kepesertaan;
use DataTables, Hasher, Validator;

class PenetapanSKMPController extends Controller
{
    public function getCreate(Request $request)
    {
        $alasan = MasterAlasanPensiun::all();
        $unit_pembayaran = MasterUnitPembayaran::all();
        $kodeaktif = Kepesertaan::all();
        return view('kepesertaan.skpensiunan.manfaatpensiun.create', compact('kodeaktif','alasan','unit_pembayaran'));
    }

    public function ajaxList()
    {
        $data = PenetapanSKMP::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/manfaatpensiun/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/manfaatpensiun/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->nama_peserta ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {
        $peserta_aktif = $request->kode_aktif;
        $arr_aktif = explode(' - ', $peserta_aktif);

        $alasan = $request->alasan;
        $arr_alasan = explode(' - ', $alasan);

        $unit_pembayaran = $request->unit_pembayaran;
        $arr_unit_pembayaran = explode(' - ', $unit_pembayaran);

        $data = new PenetapanSKMP();
        $data->penangguhan_dari = $request->berlaku_dari;
        $data->penangguhan_sampai = $request->berlaku_sampai;
        $data->mkp_dari = $request->mkp_berlaku_dari;
        $data->mkp_sampai = $request->mkp_berlaku_sampai;
        $data->kode_peserta = $arr_aktif[0];
        $data->nama_peserta = $arr_aktif[1];
        $data->kode_alasan = $arr_alasan[0];
        $data->nama_alasan = $arr_alasan[1];
        $data->tgl_alasan = $request->tgl_alasan;
        $data->kode_unit_pembayaran = $arr_unit_pembayaran[0];
        $data->nama_unit_pembayaran = $arr_unit_pembayaran[1];
        $data->tgl_mpbayar = $request->tgl_mpdibayar;
        $data->tgl_mpturun = $request->tgl_mpturunan;
        $data->mp_sekaligus = $request->mp_sekaligus;
        $data->mp_pertama = $request->mp_pertama;
        $data->mp_bulanan = $request->mp_bulanan;
        $data->no_rek_lain = $request->no_rek_lain;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil menambah SK Pensiunan '.$data->no_sk_pensiun);
        }
    }

    public function getDetail($id)
    {
        $alasan = MasterAlasanPensiun::all();
        $unit_pembayaran = MasterUnitPembayaran::all();
        $kodeaktif = Kepesertaan::all();
        $data = PenetapanSKMP::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.manfaatpensiun.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = PenetapanSKMP::find($id);
        {
            $peserta_aktif = $request->kode_aktif;
            $arr_aktif = explode(' - ', $peserta_aktif);

            $alasan = $request->alasan;
            $arr_alasan = explode(' - ', $alasan);

            $unit_pembayaran = $request->unit_pembayaran;
            $arr_unit_pembayaran = explode(' - ', $unit_pembayaran);

            $data->penangguhan_dari = $request->berlaku_dari;
            $data->penangguhan_sampai = $request->berlaku_sampai;
            $data->mkp_dari = $request->mkp_berlaku_dari;
            $data->mkp_sampai = $request->mkp_berlaku_sampai;
            $data->kode_peserta = $arr_aktif[0];
            $data->nama_peserta = $arr_aktif[1];
            $data->kode_alasan = $arr_alasan[0];
            $data->nama_alasan = $arr_alasan[1];
            $data->tgl_alasan = $request->tgl_alasan;
            $data->kode_unit_pembayaran = $arr_unit_pembayaran[0];
            $data->nama_unit_pembayaran = $arr_unit_pembayaran[1];
            $data->tgl_mpbayar = $request->tgl_mpdibayar;
            $data->tgl_mpturun = $request->tgl_mpturunan;
            $data->mp_sekaligus = $request->mp_sekaligus;
            $data->mp_pertama = $request->mp_pertama;
            $data->mp_bulanan = $request->mp_bulanan;
            $data->no_rek_lain = $request->no_rek_lain;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil mengubah Manfaat Pensiunan '.$data->nama_peserta);
        }
    }

    public function getEdit($id)
    {
        $alasan = MasterAlasanPensiun::all();
        $unit_pembayaran = MasterUnitPembayaran::all();
        $kodeaktif = Kepesertaan::all();
        $data = PenetapanSKMP::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.manfaatpensiun.edit', compact('data','kodeaktif','alasan','unit_pembayaran'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function destroy($id)
    {
        $data = PenetapanSKMP::find($id);
        if(isset($data))
        {
            return redirect()->back()->with('success', 'Berhasil menghapus Manfaat Pensiunan '.$data->nama_peserta);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Manfaat Pensiunan');
        }
    }
}
