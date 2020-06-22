<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\ManfaatPensiunan\RapelExtraManfaat;
use App\Models\Kepesertaan\Kepesertaan;
use App\Models\Masters\MasterVoucher;
use App\Models\JenisTransaksi;
use App\Models\MasterAlasan;
use App\Models\Masters\MasterAlasanPensiun;
use DataTables, Hasher, Validator, DB;

class RapelExtraManfaatController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.index');
    }

    public function ajaxList()
    {
        $data = RapelExtraManfaat::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
            return "
                <a class=\"btn btn-xs btn-info\" href=\"" . url('kepesertaan/manfaatpensiunan/rapelextramanfaat/detail/' . $hashed_id) . "\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"" . url('kepesertaan/manfaatpensiunan/rapelextramanfaat/edit/' . $hashed_id) . "\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"" . $hashed_id . "\" data-name=\"" . $row->jenis_transaksi . "\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
        })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate(Request $request)
    {
        $jenistrx = JenisTransaksi::all();
        $peserta = Kepesertaan::all();
        $kodepensiun = MasterAlasanPensiun::all();
        $kodvcr = MasterVoucher::all();
        return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.create', compact('peserta','jenistrx','kodepensiun','kodvcr'));
    }

    public function postCreate(Request $request)
    {

        $peserta = $request->kode_pensiun;
        $arr_peserta = explode(' - ', $peserta);


        $data = new RapelExtraManfaat();
        $data->jenis_transaksi = $request->jenis_transaksi;
        $data->kode_voucher = $request->kode_voucher;
        $data->no_trx = $request->no_trx;
        $data->tgl_trx = $request->tgl_trx;
        $data->no_daftar_bayar_MP = $request->no_daftar_bayar_MP;
        $data->kode_pensiun = $arr_peserta[0];
        $data->nama = $arr_peserta[1];
        $data->berlaku_dari = $request->berlaku_dari;
        $data->berlaku_sampai = $request->berlaku_sampai;
        $data->pph21 = $request->pph21;
        $data->nonpph21 = $request->nonpph21;
        $data->keterangan = $request->keterangan;
        if (isset($data))
        {
            $data->save();
            return redirect('kepesertaan/manfaatpensiunan/rapelextramanfaat')->with('success', 'Berhasil menambah Manfaat Pensiunan ');
        }
    }

    public function uploadExcel(Request $request)
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $excel = $request->file('excel');
        // Move Uploaded File
        if(isset($excel))
        {
            $destinationPath = 'files';
            $excel->move($destinationPath, $excel->getClientOriginalName());
            $excel1 = $excel->getClientOriginalName();
        }
        else
        {
            $excel1 = null;
        }

        Excel::import(new RapelManfaatImport, public_path('/files/'.$excel1));
        return redirect()->back()->with('success', 'Berhasil Upload File');
    }

    public function getDetail($id)
    {

        $data = RapelExtraManfaat::find($id);
        if(isset($data))
        {
            return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $jenistrx = JenisTransaksi::all();
        $peserta = Kepesertaan::all();
        $kodepensiun = MasterAlasanPensiun::all();
        $kodvcr = MasterVoucher::all();
        $data = RapelExtraManfaat::find($id);
        if(isset($data))
        {
            return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.edit', compact('jenistrx','peserta','kodepensiun','kodvcr','data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Rapel Extra Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $peserta = $request->kode_pensiun;
        $arr_peserta = explode(' - ', $peserta);

        $data = RapelExtraManfaat::find($id);

        $data->jenis_transaksi = $request->jenis_transaksi;
        $data->kode_voucher = $request->kode_voucher;
        $data->no_trx = $request->no_trx;
        $data->tgl_trx = $request->tgl_trx;
        $data->no_daftar_bayar_MP = $request->no_daftar_bayar_MP;
        $data->kode_pensiun = $arr_peserta[0];
        $data->nama = $arr_peserta[1];
        $data->berlaku_dari = $request->berlaku_dari;
        $data->berlaku_sampai = $request->berlaku_sampai;
        $data->pph21 = $request->pph21;
        $data->nonpph21 = $request->nonpph21;
        $data->keterangan = $request->keterangan;


        if (isset($data)){
            $data->save();
            return redirect('kepesertaan/manfaatpensiunan/rapelextramanfaat')->with('success', 'Berhasil mengubah Manfaat Pensiunan ');
        }
    }


    public function destroy($id)
    {
        $data = RapelExtraManfaat::find($id);
        if (isset($data)) {

            $data->delete();

            return redirect('kepesertaan/manfaatpensiunan/rapelextramanfaat')->with('success', 'Berhasil menghapus data transaksi ');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
