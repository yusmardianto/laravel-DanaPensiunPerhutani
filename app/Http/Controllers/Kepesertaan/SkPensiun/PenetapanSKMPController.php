<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\SkPensiun\PenetapanSKMP;
use App\Models\Masters\MasterAlasanPensiun;
use App\Models\Masters\MasterUnitPembayaran;
use App\Models\Kepesertaan\Kepesertaan;
use DataTables, Hasher, Validator;

class PenetapanSKMPController extends Controller
{
    public function getCreate(Request $request)
    {
        $alasan = MasterAlasanPensiun::all();
        $unit_pembayaran = MasterUnitPembayaran::all();
        $kodeaktif = Kepesertaan::all();
        return view('kepesertaan.skpensiunan.manfaatpensiun.create', compact('kodeaktif','alasan','unit_pembayaran'));
    }

    public function ajaxList()
    {
        $data = PenetapanSKMP::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/manfaatpensiun/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/manfaatpensiun/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->no_sk_pensiun ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

}
