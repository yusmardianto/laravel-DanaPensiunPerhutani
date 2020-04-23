<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Pemasukan;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class PemasukanController extends Controller
{
    public function index()
    {
        return view('keuangan.pemasukan.index');
    }

    public function getCreate()
    {
        return view('keuangan.pemasukan.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'jenis_trx' => 'nullable',
            'kd_periode' => 'required',
            'no_trxIn' => 'required|unique:pemasukans,no_trxIn',
            'tgl_trxIn' => 'reuired',
            'kd_voucher' => 'required',
            'nilai_trxIn' => 'required',
        ];

        $messages = [
            'no_trxIn.unique' => 'Nomor Transaksi sudah ada',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new Pemasukans();
            $data->jenis_tx = $request->jenis_tx;
            $data->kd_periode = $request->kd_periode;
            $data->no_TrxIn = $request->no_TrxIn;
            $data->tgl_trxIn = $request->tgl_trxIn;
            $data->kd_voucher = $request->kd_voucher;
            $data->nilai_trxIn = $request->nilai_trxIn;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('keuangan/pemasukan')->with('success', 'Berhasil menambah data pemasukan '.$request->name);
        }
    }
}
