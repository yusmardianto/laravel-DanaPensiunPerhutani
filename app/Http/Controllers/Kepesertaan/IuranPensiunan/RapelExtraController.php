<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\IuranPensiunan\RapelExtra;
use App\Models\Masters\MasterVoucher;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator, DB;

class RapelExtraController extends Controller
{
    public function index()
    {
        return view('kepesertaan.iuranpensiunan.rapel-extra.index');
    }

    public function ajaxList()
    {
        $data = RapelExtra::whereNotNull('created_at');
        $datatables = DataTables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/iuranpensiunan/rapel-extra/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/iuranpensiunan/rapel-extra/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->nama ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        $voucher = MasterVoucher::all();
        return view('kepesertaan.iuranpensiunan.rapel-extra.create', compact('voucher'));
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'no_transaksi' => 'required|unique:rapel_extras,no_transaksi',
        ];

        $messages = [
            'no_transaksi.unique' => 'Nomor Transaksi sudah ada',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new RapelExtra();
            $data->kd_voucher = $request->kd_voucher;
            $data->no_transaksi = $request->no_transaksi;
            $data->tgl_transaksi = $request->tgl_transaksi;
            $data->kd_peserta = $request->kd_peserta;
            $data->nama_peserta = $request->nama_peserta;
            $data->berlaku_dari = $request->berlaku_dari;
            $data->berlaku_sampai = $request->berlaku_sampai;
            $data->gaji_pokok = $request->gaji_pokok;
            $data->phdp = $request->phdp;
            $data->beban_peserta = $request->beban_peserta;
            $data->beban_pemberikerja = $request->beban_pemberikerja;
            $data->total_rapel = $request->total_rapel;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('kepesertaan/iuranpensiunan/rapel-extra')->with('success', 'Berhasil menambah data transaksi iuran');
        }
    }

    public function getDetail($id)
    {
        $data = RapelExtra::find($id);
        if (isset($data)) {
            return view('kepesertaan.iuranpensiunan.rapel-extra.detail', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Data transaksi iuran tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $voucher = MasterVoucher::all();
        $data = RapelExtra::find($id);
        if (isset($data)) {
            return view('kepesertaan.iuranpensiunan.rapel-extra.edit', compact('data', 'voucher'));
        } else {
            return redirect()->back()->with('error', 'Data transaksi iuran tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = RapelExtra::find($id);

        $data->kd_voucher = $request->kd_voucher;
        $data->no_transaksi = $request->no_transaksi;
        $data->tgl_transaksi = $request->tgl_transaksi;
        $data->kd_peserta = $request->kd_peserta;
        $data->nama_peserta = $request->nama_peserta;
        $data->berlaku_dari = $request->berlaku_dari;
        $data->berlaku_sampai = $request->berlaku_sampai;
        $data->gaji_pokok = $request->gaji_pokok;
        $data->phdp = $request->phdp;
        $data->beban_peserta = $request->beban_peserta;
        $data->beban_pemberikerja = $request->beban_pemberikerja;
        $data->total_rapel = $request->total_rapel;
        $data->keterangan = $request->keterangan;

        if (isset($data)) {
            $data->save();
            return redirect('kepesertaan/iuranpensiunan/rapel-extra')->with('success', 'Berhasil mengubah data transaksi iuran ');
        }
    }

    public function destroy($id)
    {
        $data = RapelExtra::find($id);
        if (isset($data)) {

            $data->delete();

            return redirect('kepesertaan/iuranpensiunan/rapel-extra')->with('success', 'Berhasil menghapus data transaksi iuran ');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
