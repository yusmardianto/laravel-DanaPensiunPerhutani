<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterTanggungan;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class MasterTanggunganController extends Controller
{
    public function index()
    {
        return view('masters.tanggungan.index');
    }

    public function ajaxList(Request $request)
    {
        $data = MasterTanggungan::whereNotNull('created_at');
        $datatables = Datatables::of($data);

        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/tanggungan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/tanggungan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-nama=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.tanggungan.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'name' => 'required|unique:master_tanggungans,name',
        ];

        $messages = [
            'name.unique' => 'Tanggungan sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data = new MasterTanggungan();
            $data->name = $request->name;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('masters/tanggungan')->with('success', 'Berhasil menambah data tanggungan '.$request->name);
        }
    }
}
