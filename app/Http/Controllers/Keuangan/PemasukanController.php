<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Pemasukan;
use App\Models\Masters\MasterVoucher;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class PemasukanController extends Controller
{
    public function index()
    {
        return view('keuangan.pemasukan.index');
    }

    public function ajaxList()
    {
        $data = Pemasukan::whereNotNull('created_at')
        ->orderBy('created_at', 'DESC');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('keuangan/pemasukan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('keuangan/pemasukan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->addColumn('nilai', function($row) {
                return 'Rp '.($row->nilai_trxIn);
            })
            ->rawColumns(['action', 'nilai'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        $voucher = MasterVoucher::all();
        return view('keuangan.pemasukan.create', compact('voucher'));
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'no_trxIn' => 'required|unique:pemasukans,no_trxIn',
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
            $data = new Pemasukan();
            $data->jenis_trx = $request->jenis_trx;
            $data->kd_periode = $request->kd_periode;
            $data->no_trxIn = $request->no_trxIn;
            $data->tgl_trxIn = $request->tgl_trxIn;
            $data->kd_voucher = $request->kd_voucher;
            $data->nilai_trxIn = $request->nilai_trxIn;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('keuangan/pemasukan')->with('success', 'Berhasil menambah data transaksi pemasukan');
        }
    }

    public function getDetail($id)
    {
        $data = Pemasukan::find($id);
        if (isset($data)) {
            return view('keuangan.pemasukan.detail', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Data Pemasukan Kas tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $voucher = MasterVoucher::all();
        $data = Pemasukan::find($id);
        if (isset($data)) {
            return view('keuangan.pemasukan.edit', compact('data', 'voucher'));
        } else {
            return redirect()->back()->with('error', 'Data Pemasukan Kas tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = Pemasukan::find($id);

        $data->jenis_trx = $request->jenis_trx;
        $data->kd_periode = $request->kd_periode;
        $data->no_trxIn = $request->no_trxIn;
        $data->tgl_trxIn = $request->tgl_trxIn;
        $data->kd_voucher = $request->kd_voucher;
        $data->nilai_trxIn = $request->nilai_trxIn;
        $data->keterangan = $request->keterangan;

        if (isset($data)) {
            $data->save();
            return redirect('keuangan/pemasukan')->with('success', 'Berhasil mengubah Data Pemasukan Kas ');
        }
    }

    public function destroy($id)
    {
        $data = Pemasukan::find($id);
        if (isset($data)) {

            $data->delete();

            return redirect('keuangan/pemasukan')->with('success', 'Berhasil menghapus Data Pemasukan Kas ');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
