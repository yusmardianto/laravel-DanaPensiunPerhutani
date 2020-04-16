<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\Kepesertaan;
use Illuminate\Http\Request;
use DataTables, Hasher, Validator;

class PesertaAktifController extends Controller
{
    public function index()
    {
        return view('masters.peserta.index');
    }

    public function ajaxList()
    {
        $data = Kepesertaan::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/peserta/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getDetail($id)
    {
        $data = Kepesertaan::find($id);
        if(isset($data))
        {
            return view('masters.peserta.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Master Peserta tidak ditemukan');
        }
    }

    public function destroy($id)
    {
        $data = Kepesertaan::find($id);
        if(isset($data))
        {
            unlink(public_path('foto/masterpeserta/'.$data->photo));
            $data->delete();
            return redirect()->back()->with('success', 'Berhasil menghapus Peserta '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
