<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\Kepesertaan;
use App\Models\Masters\MasterUnitPembayaran;

class ManfaatPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.manfaatpensiunan.index');
    }

    public function getCreate(Request $request)
    {
        $peserta = Kepesertaan::all();
        $unit = MasterUnitPembayaran::all();
        return view('kepesertaan.manfaatpensiunan.create', compact('peserta','unit'));
    }

    public function ajaxList()
    {
        $data = ManfaatPensiunan::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/manfaatpensiunan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/manfaatpensiunan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->no_sk_pensiun ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
