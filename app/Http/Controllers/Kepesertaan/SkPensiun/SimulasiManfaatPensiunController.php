<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kepesertaan\SkPensiun\SimulasiManfaatPensiun;
use DataTables, Hasher, Validator;

class SimulasiManfaatPensiunController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.skpensiunan.simulasimp.index');
    }

    public function getCreate(Request $request)
    {
        return view('kepesertaan.skpensiunan.simulasimp.create');
    }

    public function ajaxList()
    {
        $data = SimulasiManfaatPensiun::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/simulasimp/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/simulasimp/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->peserta_pasif ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
