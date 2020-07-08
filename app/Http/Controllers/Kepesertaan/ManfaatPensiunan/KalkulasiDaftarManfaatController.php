<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KalkulasiDaftarManfaat;
use App\Models\Kepesertaan\ManfaatPensiunan\KalkulasiManfaat;

use DataTables, Hasher;

class KalkulasiDaftarManfaatController extends Controller
{
    public function index(Request $request)
    {

        return view('kepesertaan.manfaatpensiunan.kalkulasidaftarmp.index');
    }

    public function ajaxList()
    {
        $data = KalkulasiManfaat::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
            return "
                <a class=\"btn btn-xs btn-info\" href=\"" . url('kepesertaan/manfaatpensiunan/kalkulasidaftarmp/detail/' . $hashed_id) . "\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"" . url('kepesertaan/manfaatpensiunan/kalkulasidaftarmp/hitung/' . $hashed_id) . "\"><i class=\"glyphicon glyphicon-edit\"></i> Hitung</a>
                ";
        })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate(Request $request)
    {
        $jenispmb = KalkulasiManfaat::all();
        return view('kepesertaan.manfaatpensiunan.kalkulasidaftarmp.create', compact('jenispmb'));
    }

    public function postCreate(Request $request)
    {

        $data = new KalkulasiManfaat();
        $data->jenis_pembayaran = $request->jenis_pembayaran;
        $data->kode_voucher = $request->kode_voucher;

        if (isset($data)) {
            $data->save();
            return redirect('kepesertaan/manfaatpensiunan/kalkulasidaftarmp')->with('success', 'Berhasil menambah kalkulasi Manfaat Pensiunan ');
        }
    }

    public function getDetail($id)
    {
        $data = KalkulasiManfaat::find($id);
        if(isset($data))
        {
            return view('kepesertaan.manfaatpensiunan.kalkulasidaftarmp.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Manfaat Pensiunan tidak ditemukan');
        }
    }

}
