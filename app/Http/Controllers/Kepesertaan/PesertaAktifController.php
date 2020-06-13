<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Kepesertaan\Kepesertaan;
use App\Models\Masters\MasterBank;
use App\Models\Masters\MasterGolongan;
use App\Models\Masters\MasterStatus;
use App\Models\Regencies;
use App\Models\Religion;
use App\Imports\KepesertaanImport;
use DataTables, Hasher, Validator, DB, Excel;

class PesertaAktifController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.peserta.index');
    }

    public function ajaxList()
    {
        $data = Kepesertaan::where('is_active', '=', 1);

        $datatables = DataTables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/peserta-aktif/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/peserta-aktif/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->nama ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate(Request $request)
    {
        $regencies = Regencies::all();
        $gender = Gender::all();
        $religion = Religion::all();
        $golongan = MasterGolongan::all();
        $status = MasterStatus::all();
        return view('kepesertaan.peserta.create', compact('golongan','status','regencies','gender','religion'));
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'email' => 'required|unique:kepesertaans,email',
            'nip' => 'required|unique:kepesertaans,nip',
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'nip.unique' => 'Nomer Induk Peserta sudah terdaftar',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new Kepesertaan();
        $data->kode_aktif = $request->kode_aktif;
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->birthdate = $request->birthdate;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->agama = $request->agama;
        $data->tanggungan = $request->tanggungan;
        $data->tgl_jadi_pegawai = $request->tgl_jadi_pegawai;
        $data->tgl_jadi_peserta = $request->tgl_jadi_peserta;
        $data->mk_peserta = $request->mk_peserta;
        $data->golongan = $request->golongan;
        $data->golongan_gaji = $request->golongan_gaji;
        $data->status = $request->status;
        $data->status_gaji = $request->status_gaji;
        $data->pangkat = $request->pangkat;
        $data->email = $request->email;
        $data->keterangan = $request->keterangan;
        $data->is_active = 1;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/peserta-aktif')->with('success', 'Berhasil menambah Peserta Aktif '.$data->nama);
        }
    }

    public function getDetail($id)
    {
        $data = Kepesertaan::with('sk','regency','jeniskelamin','religi','gol','stat')->find($id);
        if(isset($data))
        {
            return view('kepesertaan.peserta.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $regencies = Regencies::all();
        $gender = Gender::all();
        $religion = Religion::all();
        $golongan = MasterGolongan::all();
        $status = MasterStatus::all();

        $data = Kepesertaan::find($id);
        if(isset($data))
        {
            return view('kepesertaan.peserta.edit', compact('regencies','gender','religion','golongan','status','data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = Kepesertaan::find($id);

        $rules = [
            'email' => 'required|unique:kepesertaans,email,'.$id,
            'nip' => 'required|unique:kepesertaans,nip,'.$id,
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'nip.unique' => 'Nomer Induk Peserta sudah terdaftar',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $data->kode_aktif = $request->kode_aktif;
            $data->nama = $request->nama;
            $data->nip = $request->nip;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->birthdate = $request->birthdate;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->agama = $request->agama;
            $data->tanggungan = $request->tanggungan;
            $data->tgl_jadi_pegawai = $request->tgl_jadi_pegawai;
            $data->tgl_jadi_peserta = $request->tgl_jadi_peserta;
            $data->mk_peserta = $request->mk_peserta;
            $data->golongan = $request->golongan;
            $data->golongan_gaji = $request->golongan_gaji;
            $data->status = $request->status;
            $data->status_gaji = $request->status_gaji;
            $data->pangkat = $request->pangkat;
            $data->email = $request->email;
            $data->keterangan = $request->keterangan;
            $data->is_active = $request->is_active;

            $data->save();
            return redirect('kepesertaan/peserta-aktif')->with('success', 'Berhasil mengubah Peserta Aktif '.$data->nama);
        }
    }

    public function destroy($id)
    {
        $data = Kepesertaan::find($id);
        if(isset($data))
        {
            $data->delete();

            return redirect()->back()->with('success', 'Berhasil menghapus Peserta Aktif '.$data->nama);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Peserta Aktif');
        }
    }

    public function getByGolongan($golId)
    {
        $html = 'Rp'. "";
        $data = MasterGolongan::where('id', $golId)->first();
        if(isset($data))
        {
            $html = 'Rp '. number_format($data->gajipokok, 2, ".", ",");
        }
        return response()->json(['html' => $html]);
    }

    public function getByStatus($statId)
    {
        $html = 'Rp'. "";
        $data = MasterStatus::where('id', $statId)->first();
        if(isset($data))
        {
            $html = 'Rp '. number_format($data->gajipokok, 2, ".", ",");
        }
        return response()->json(['html' => $html]);
    }

    public function uploadExcel(Request $request)
    {
        set_time_limit(0);
        ini_set('memory_limit', '-1');

        $excel = $request->file('excel');
        // Move Uploaded File
        if(isset($excel))
        {
            $destinationPath = 'files';
            $excel->move($destinationPath, $excel->getClientOriginalName());
            $excel1 = $excel->getClientOriginalName();
        }
        else
        {
            $excel1 = null;
        }

        Excel::import(new KepesertaanImport, public_path('/files/'.$excel1));
        return redirect()->back()->with('success', 'Berhasil Upload File');
    }
}
