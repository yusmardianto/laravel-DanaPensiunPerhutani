<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterBank;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class MasterBankController extends Controller
{
    public function index()
    {
        return view('masters.bank.index');
    }

    public function ajaxList(Request $request)
    {
        $data = MasterBank::whereNotNull('created_at')
        ->orderBy('kd_bank', 'ASC');
        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/bank/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/bank/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.bank.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kd_bank' => 'required|unique:master_banks,kd_bank',
            'name' => 'required|unique:master_banks,name',
        ];

        $messages = [
            'kd_bank.unique' => 'Kode Bank sudah terdaftar.',
            'name.unique' => 'Nama Bank sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterBank();
            $data->kd_bank = $request->kd_bank;
            $data->name = $request->name;

            $data->save();
            return redirect('masters/bank')->with('success', 'Berhasil menambah data '.$request->name);
        }
    }

    public function getDetail($id)
    {
        $data = MasterBank::find($id);
        if(isset($data))
        {
            return view('masters.bank.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterBank::find($id);
        if(isset($data))
        {
            return view('masters.bank.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterBank::find($id);
        if(isset($data))
        {
            $data->kd_bank = $request->kd_bank;
            $data->name = $request->name;

            $data->save();
            return redirect('masters/bank')->with('success', 'Berhasil mengubah data '.$request->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah data '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = MasterBank::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect('masters/bank')->with('success', 'Berhasil menghapus data '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
