<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterGroupPembayaran;
use App\Models\Masters\MasterUnitPembayaran;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class UnitPembayaranController extends Controller
{
    public function index()
    {
        return view('masters.unit-pembayaran.index');
    }

    public function ajaxList()
    {
        $data = MasterUnitPembayaran::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/unit-pembayaran/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/unit-pembayaran/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
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
        $kodegroup = MasterGroupPembayaran::all();
        return view('masters.unit-pembayaran.create', compact('kodegroup'));
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kode_unit' => 'required|unique:master_unit_pembayarans,kode_unit',
        ];

        $messages = [
            'kode_unit.unique' => 'Kode Unit sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterUnitPembayaran();
            $data->kode_unit = $request->kode_unit;
            $data->name = $request->name;
            $data->kode_group = $request->kode_group;
            $data->alamat = $request->alamat;
            $data->kota = $request->kota;
            $data->pos = $request->pos;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/unit-pembayaran')->with('success', 'Berhasil menambah Unit Pembayaran '.$request->name);
        }
    }

    public function getDetail($id)
    {
        $kodegroup = MasterGroupPembayaran::all();
        $data = MasterUnitPembayaran::find($id);
        if(isset($data))
        {
            return view('masters.unit-pembayaran.detail', compact('data','kodegroup'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $kodegroup = MasterGroupPembayaran::all();
        $data = MasterUnitPembayaran::find($id);
        if(isset($data))
        {
            return view('masters.unit-pembayaran.edit', compact('data','kodegroup'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterUnitPembayaran::find($id);
        if(isset($data))
        {
            $data->kode_unit = $request->kode_unit;
            $data->name = $request->name;
            $data->kode_group = $request->kode_group;
            $data->alamat = $request->alamat;
            $data->kota = $request->kota;
            $data->pos = $request->pos;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/unit-pembayaran')->with('success', 'Berhasil mengubah Data Unit Pembayaran '.$request->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Data Data Unit Pembayaran '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = MasterUnitPembayaran::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Unit Pembayaran '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Unit Pembayaran tidak ditemukan');
        }
    }
}
