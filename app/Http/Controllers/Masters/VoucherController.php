<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masters\Voucher;
use DataTables, Hasher, Validator;

class VoucherController extends Controller
{
    public function index()
    {
        return view('masters.voucher.index');
    }

    public function getCreate()
    {
        return view('masters.voucher.create');
    }

    public function ajaxList()
    {
        $data = Voucher::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Edit</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {

        $rules = [
            'kode_voucher' => 'required|unique:master_vouchers,kode_voucher',
        ];

        $messages = [
            'kode_voucher.unique' => 'Kode Voucher tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new Voucher();
        $data->kode_voucher = $request->kode_voucher;
        $data->nama_voucher = $request->nama_voucher;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/voucher')->with('success', 'Berhasil menambah Kode Voucher'.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = Voucher::find($id);
        if(isset($data))
        {

            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Peserta Aktif '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Peserta Aktif');
        }
    }

}
