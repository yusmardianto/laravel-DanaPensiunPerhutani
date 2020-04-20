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
        $data = SkPensiun::where('status', '=', 1);

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->nama ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
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
            return redirect('kepesertaan/skpensiunan')->with('success', 'Berhasil menambah SK Pensiunan'.$data->name);
        }
    }
}
