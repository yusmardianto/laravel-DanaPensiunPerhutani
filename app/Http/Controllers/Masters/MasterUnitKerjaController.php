<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterUnitKerja;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class MasterUnitKerjaController extends Controller
{
    public function index()
    {
        return view('masters.unit-kerja.index');
    }

    public function ajaxList(Request $request)
    {
        $data = MasterUnitKerja::whereNotNull('created_at')
        ->orderBy('id', 'ASC');
        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('config/role/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('config/role/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
}
