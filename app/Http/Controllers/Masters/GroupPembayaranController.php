<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterGroupPembayaran;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class GroupPembayaranController extends Controller
{
    public function index()
    {
        return view('masters.group-pembayaran.index');
    }

    public function ajaxList()
    {
        $data = MasterGroupPembayaran::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/group-pembayaran/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/group-pembayaran/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->addColumn('gapok', function($row) {
                return 'Rp '. number_format($row->gajipokok, 2, ",", '.');
            })
            ->rawColumns(['action', 'gapok'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.group-pembayaran.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kode_group' => 'required|unique:master_group_pembayarans,kode_group',
        ];

        $messages = [
            'kode_group.unique' => 'Kode Group sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterGroupPembayaran();
            $data->kode_group = $request->kode_group;
            $data->name = $request->name;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/group-pembayaran')->with('success', 'Berhasil menambah Group Pembayaran '.$request->name);
        }
    }

    public function getDetail($id)
    {
        $data = MasterGroupPembayaran::find($id);
        if(isset($data))
        {
            return view('masters.group-pembayaran.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterGroupPembayaran::find($id);
        if(isset($data))
        {
            return view('masters.group-pembayaran.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterGroupPembayaran::find($id);
        if(isset($data))
        {
            $data->kode_group = $request->kode_group;
            $data->name = $request->name;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/pejabat-kerja')->with('success', 'Berhasil mengubah Data Group Pembayaran '.$request->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Data Data Group Pembayaran '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = MasterGroupPembayaran::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Group Pembayaran '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Group Pembayaran tidak ditemukan');
        }
    }
}
