<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kepesertaan\Kepesertaan;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.peserta.index');
    }

    public function ajaxList()
    {
        $data = Kepesertaan::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/peserta-aktif/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/peserta-aktif/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate(Request $request)
    {
        return view('kepesertaan.peserta.create');
    }

    public function postCreate(Request $request)
    {
        $foto = $request->file('photo');
        if(isset($foto))
        {
            $destinationPath = 'foto/masterpeserta';
            $foto->move($destinationPath, $foto->getClientOriginalName());
            $photo = $foto->getClientOriginalName();
        }
        else
        {
            $photo = null;
        }

        $rules = [
            'email' => 'required|unique:kepesertaans,email',
            'no_telpon' => 'required|unique:kepesertaans,phonenumber',
            'no_ktp' => 'required|unique:kepesertaans,no_ktp',
            'nip' => 'required|unique:kepesertaans,nip',
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'phonenumber.unique' => 'No. Telepon tersebut sudah terdaftar.',
            'no_ktp.unique' => 'No. KTP sudah terdaftar',
            'nip.unique' => 'Nomer Induk Peserta sudah terdaftar',
        ];

        $data = new Kepesertaan();
        $data->kode_aktif = $request->kode_aktif;
        $data->nama = $request->nama;
        $data->no_ktp = $request->no_ktp;
        $data->nip = $request->nip;
        $data->birthdate = $request->birthdate;
        $data->alamat = $request->alamat;
        $data->kota = $request->kota;
        $data->kode_pos = $request->kode_pos;
        $data->agama = $request->agama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_telpon = $request->no_telpon;
        $data->email = $request->email;
        $data->golongan = $request->golongan;
        $data->keterangan = $request->keterangan;
        $data->photo = $photo;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/peserta-aktif')->with('success', 'Berhasil menambah Peserta Aktif'.$data->name);
        }
    }
}
