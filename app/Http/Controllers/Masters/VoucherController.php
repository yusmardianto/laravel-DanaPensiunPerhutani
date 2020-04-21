<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterVoucher;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator, Auth;

class VoucherController extends Controller
{
    public function index()
    {
        return view('masters.voucher.index');
    }

    public function ajaxList()
    {
        $data = MasterVoucher::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/voucher/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/voucher/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->nama_voucher ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.voucher.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kode_voucher' => 'required|unique:master_vouchers,kode_voucher',
            'nama_voucher' => 'required|unique:master_vouchers,nama_voucher,NULL,id,keterangan,'.$request->keterangan,
        ];

        $messages = [
            'nama_voucher.unique' => 'Nama Voucher sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterVoucher();
            $data->kode_voucher = $request->kode_voucher;
            $data->nama_voucher = $request->nama_voucher;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/voucher')->with('success', 'Berhasil menambah Voucher '.$request->nama_voucher);
        }
    }

    public function getDetail($id)
    {
        $data = MasterVoucher::find($id);
        if(isset($data))
        {
            return view('masters.voucher.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterVoucher::find($id);
        if(isset($data))
        {
            return view('masters.voucher.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterVoucher::find($id);
        if(isset($data))
        {
            $data->kode_voucher = $request->kode_voucher;
            $data->nama_voucher = $request->nama_voucher;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/voucher')->with('success', 'Berhasil mengubah Voucher '.$request->nama_voucher);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Data Voucher '.$data->nama_voucher);
        }
    }

    public function destroy($id)
    {
        $data = MasterVoucher::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Data Voucher '.$data->nama_voucher);
        }
        else
        {
            return redirect()->back()->with('error', 'Voucher tidak ditemukan');
        }
    }
}
