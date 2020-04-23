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
}
