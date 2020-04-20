<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\Periode;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class PeriodeController extends Controller
{
    public function index()
    {
        return view('masters.periode.index');
    }

    public function getCreate()
    {
        return view('masters.periode.create');
    }

    public function ajaxList()
    {
        $data = Periode::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/status/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Edit</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {

        $rules = [
            'periode' => 'required|unique:master_periodes,periode',
        ];

        $messages = [
            'periode.unique' => 'Periode tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new Periode();
        $data->periode = $request->periode;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/periode')->with('success', 'Berhasil menambah Periode'.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = Periode::find($id);
        if(isset($data))
        {

            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Periode '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Periode');
        }
    }
}
