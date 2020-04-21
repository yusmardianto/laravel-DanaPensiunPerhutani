<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\SkPensiun;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class SKPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.skpensiunan.index');
    }

    public function getCreate(Request $request)
    {
        return view('kepesertaan.skpensiunan.create');
    }

    public function ajaxList()
    {
        $data = SkPensiun::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->no_sk_pensiun ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'no_sk_pensiun' => 'required|unique:sk_pensiuns,no_sk_pensiun',
            'npwp' => 'required|unique:sk_pensiuns,npwp',
        ];

        $messages = [
            'no_sk_pensiun.unique' => 'Nomer SK Pensiun tersebut sudah terdaftar.',
            'npwp.unique' => 'NPWP tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new SkPensiun();
        $data->no_sk_pensiun = $request->no_sk_pensiun;
        $data->tanggal_pensiun = $request->tanggal_pensiun;
        $data->periode = $request->periode;
        $data->voucher = $request->voucher;
        $data->tanggungan = $request->tanggungan;
        $data->unit_kerja = $request->unit_kerja;
        $data->npwp = $request->npwp;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/skpensiunan')->with('success', 'Berhasil menambah SK Pensiunan'.$data->no_sk_pensiun);
        }
    }

    public function getDetail($id)
    {
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = SkPensiun::find($id);

        $rules = [
            'no_sk_pensiun' => 'required|unique:sk_pensiuns,no_sk_pensiun,'.$id,
            'npwp' => 'required|unique:sk_pensiuns,npwp,'.$id,
        ];

        $messages = [
            'no_sk_pensiun.unique' => 'Nomer SK Pensiun tersebut sudah terdaftar.',
            'npwp.unique' => 'NPWP tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data->no_sk_pensiun = $request->no_sk_pensiun;
            $data->tanggal_pensiun = $request->tanggal_pensiun;
            $data->periode = $request->periode;
            $data->voucher = $request->voucher;
            $data->tanggungan = $request->tanggungan;
            $data->unit_kerja = $request->unit_kerja;
            $data->npwp = $request->npwp;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('kepesertaan/skpensiunan')->with('success', 'Berhasil mengubah SK Pensiun '.$data->no_sk_pensiun);
        }
    }

    public function destroy($id)
    {
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return redirect()->back()->with('success', 'Berhasil menghapus SK Pensiunan '.$data->no_sk_pensiun);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus SK Pensiunan');
        }
    }
}
