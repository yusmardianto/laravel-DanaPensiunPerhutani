<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterAlasanPensiun;
use Illuminate\Http\Request;
use DataTables, Auth, Hasher, Validator;

class AlasanPensiunController extends Controller
{
    public function index()
    {
        return view('masters.alasan.index');
    }

    public function ajaxList()
    {
        $data = MasterAlasanPensiun::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/alasan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/alasan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.alasan.create');
    }

    public function postCreate(Request $request)
    {
        $auth = Auth::user();

        $data = new MasterAlasanPensiun();
        $data->kode = $request->kode;
        $data->name = $request->alasan;
        $data->syarat_pensiun = $request->syarat_pensiun;
        $data->formula_mp = $request->formula_mp;
        $data->jenis_sk = $request->jenis_sk;
        $data->jenis_pensiun = $request->jenis_pensiun;
        $data->jenis_sisa_mk = $request->jenis_sisa_mk;
        $data->usia_faktor_sekarang = $request->usia_faktor_sekarang;
        $data->usia_faktor_sekaligus = $request->usia_faktor_sekaligus;
        $data->kode_aktuaria = $request->kode_aktuaria;
        $data->created_by = $auth->id;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/alasan')->with('success', 'Berhasil menambah Alasan Pensiun '.$request->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menambah Alasan Pensiun '.$request->name);
        }
    }

    public function getDetail($id)
    {
        $data = MasterAlasanPensiun::find($id);
        if(isset($data))
        {
            return view('masters.alasan.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterAlasanPensiun::find($id);
        if(isset($data))
        {
            return view('masters.alasan.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $auth = Auth::user();
        $data = MasterAlasanPensiun::find($id);
        if(isset($data))
        {
            $data->kode = $request->kode;
            $data->name = $request->alasan;
            $data->syarat_pensiun = $request->syarat_pensiun;
            $data->formula_mp = $request->formula_mp;
            $data->jenis_sk = $request->jenis_sk;
            $data->jenis_pensiun = $request->jenis_pensiun;
            $data->jenis_sisa_mk = $request->jenis_sisa_mk;
            $data->usia_faktor_sekarang = $request->usia_faktor_sekarang;
            $data->usia_faktor_sekaligus = $request->usia_faktor_sekaligus;
            $data->kode_aktuaria = $request->kode_aktuaria;
            $data->created_by = $auth->id;

            $data->save();
            return redirect('masters/alasan')->with('success', 'Berhasil mengubah Alasan '.$request->alasan);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal mengubah Alasan Pensiun');
        }
    }

    public function destroy($id)
    {
        $data = MasterAlasanPensiun::find($id);
        if(isset($data))
        {
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Alasan '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Alasan '.$data->name);
        }
    }
}
