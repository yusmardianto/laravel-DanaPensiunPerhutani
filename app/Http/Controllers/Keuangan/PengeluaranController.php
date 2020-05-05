<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables, Hasher;

class PengeluaranController extends Controller
{
    public function index()
    {

        return view('keuangan.pengeluaran.index');

    }

    public function ajaxList()
    {
        $data = Pengeluaran::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
            return "
               <a class=\"btn btn-xs btn-info\" href=\"" . url('keuangan/pengeluaran/detail/' . $hashed_id) . "\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"" . url('keuangan/pengeluaran/edit/' . $hashed_id) . "\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"" . $hashed_id . "\" data-name=\"" . $row->name . "\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
        })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
    public function getCreate()
    {
        return view('keuangan.pengeluaran.create');
    }
    public function postCreate(Request $request)
    {
        $data = new Pengeluaran();
        $data->jenis_trx = $request->jenis_trx;
        $data->kd_periode = $request->kd_periode;
        $data->no_trxOut = $request->no_trxOut;
        $data->tgl_trxOut = $request->tgl_trxOut;
        $data->kd_voucher = $request->kd_voucher;
        $data->nilai_trxOut = $request->nilai_trxOut;
        $data->keterangan	 = $request->keterangan;


        if (isset($data)) {
            $data->save();
            return redirect('keuangan/pengeluaran')->with('success', 'Berhasil menambah Pengeluran ' . $data->name);
        }
    }

    public function getDetail($id)
    {
        $data = Pengeluaran::find($id);
        if (isset($data)) {
            return view('keuangan.pengeluaran.detail', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Data Pengeluaran Kas tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = Pengeluaran::find($id);
        if (isset($data)) {
            return view('keuangan.pengeluaran.edit', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Data Pengeluaran Kas tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = Pengeluaran::find($id);

        $data->jenis_trx = $request->jenis_trx;
        $data->kd_periode = $request->kd_periode;
        $data->no_trxOut = $request->no_trxOut;
        $data->tgl_trxOut = $request->tgl_trxOut;
        $data->kd_voucher = $request->kd_voucher;
        $data->nilai_trxOut = $request->nilai_trxOut;
        $data->keterangan = $request->keterangan;

        if (isset($data)) {
            $data->save();
            return redirect('keuangan/pengeluaran')->with('success', 'Berhasil mengubah Data Pengeluaran Kas ' . $data->name);
        }
    }

    public function destroy($id)
    {
        $data = Pengeluaran::find($id);
        if (isset($data))
        {

            $data->delete();

            return redirect()->back()->with('success', 'Berhasil menghapus Data Pengeluaran Kas ' .$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
