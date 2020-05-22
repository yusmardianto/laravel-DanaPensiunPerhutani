<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\ManfaatPensiunan;
use App\Models\Kepesertaan\Kepesertaan;
use App\Models\Masters\MasterUnitPembayaran;
use DataTables, Hasher, Validator,DB;

class ManfaatPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.index');
    }

    public function getCreate(Request $request)
    {
        $peserta = Kepesertaan::all();
        $unit = MasterUnitPembayaran::all();
        return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.create', compact('peserta','unit'));
    }

    public function ajaxList()
    {
        $data = ManfaatPensiunan::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/manfaatpensiunan/rapelextramanfaat/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/manfaatpensiunan/rapelextramanfaat/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->no_transaksi ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'no_transaksi' => 'required|unique:manfaat_pensiunans,no_transaksi',
        ];

        $messages = [
            'no_transaksi.unique' => 'Nomer Transaksi tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new ManfaatPensiunan();
        $data->no_transaksi = $request->no_transaksi;
        $data->kode_aktif = $request->kode_aktif;
        $data->kd_rapel = $request->kd_rapel;
        $data->alasan = $request->alasan;
        $data->kode_unit = $request->kode_unit;
        $data->nilai_manfaat = $request->nilai_manfaat;
        $data->tunjangan_pph = $request->tunjangan_pph;
        $data->biaya_pensiun = $request->biaya_pensiun;
        $data->penghasilan_kenapajak = $request->penghasilan_kenapajak;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/manfaatpensiunan/rapelextramanfaat')->with('success', 'Berhasil menambah Manfaat Pensiunan '.$data->no_transaksi);
        }
    }

    public function getDetail($id)
    {
        $peserta = Kepesertaan::all();
        $unit = MasterUnitPembayaran::all();
        $data = ManfaatPensiunan::find($id);
        if(isset($data))
        {
            return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $peserta = Kepesertaan::all();
        $unit = MasterUnitPembayaran::all();
        $data = ManfaatPensiunan::find($id);
        if(isset($data))
        {
            return view('kepesertaan.manfaatpensiunan.rapelextramanfaat.edit', compact('peserta','unit'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Rapel Extra Manfaat Pensiunan tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = ManfaatPensiunan::find($id);

        $rules = [
            'no_transaksi' => 'required|unique:no_transaksi,no_transaksi',
        ];

        $messages = [
            'no_transaksi.unique' => 'Nomer Transaksi tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data->no_transaksi = $request->no_transaksi;
            $data->kode_aktif = $request->kode_aktif;
            $data->kd_rapel = $request->kd_rapel;
            $data->alasan = $request->alasan;
            $data->kode_unit = $request->kode_unit;
            $data->nilai_manfaat = $request->nilai_manfaat;
            $data->tunjangan_pph = $request->tunjangan_pph;
            $data->biaya_pensiun = $request->biaya_pensiun;
            $data->penghasilan_kenapajak = $request->penghasilan_kenapajak;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('kepesertaan/manfaatpensiunan/rapelextramanfaat')->with('success', 'Berhasil mengubah Manfaat Pensiunan '.$data->no_transaksi);
        }
    }

    public function destroy($id)
    {
        $data = ManfaatPensiunan::find($id);
        if(isset($data))
        {
            return redirect()->back()->with('success', 'Berhasil menghapus Manfaat Pensiunan '.$data->no_transaksi);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Manfaat Pensiunan');
        }
    }

}
