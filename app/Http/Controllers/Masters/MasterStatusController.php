<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterStatus;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class MasterStatusController extends Controller
{
    public function index()
    {
        return view('masters.status.index');
    }

    public function ajaxList()
    {
        $data = MasterStatus::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/status/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
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
        return view('masters.status.create');
    }
}
