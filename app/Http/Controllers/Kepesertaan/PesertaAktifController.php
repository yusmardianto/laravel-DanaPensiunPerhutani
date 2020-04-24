<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\Kepesertaan;
use DataTables, Hasher, Validator;

class PesertaAktifController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.peserta.index');
    }

    public function ajaxList()
    {
        $data = Kepesertaan::where('status', '=', 1);

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
        return view('kepesertaan.peserta.create');
    }

    public function postCreate(Request $request)
    {
        $foto = $request->file('photo');
        if(isset($foto))
        {
            $destinationPath = 'foto/peserta';
            $foto->move($destinationPath, $foto->getClientOriginalName());
            $photo = $foto->getClientOriginalName();
        }
        else
        {
            $photo = null;
        }

        $rules = [
            'email' => 'required|unique:kepesertaans,email',
            'no_telpon' => 'required|unique:kepesertaans,no_telpon',
            'no_ktp' => 'required|unique:kepesertaans,no_ktp',
            'nip' => 'required|unique:kepesertaans,nip',
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'no_telpon.unique' => 'No. Telepon tersebut sudah terdaftar.',
            'no_ktp.unique' => 'No. KTP sudah terdaftar',
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
        $data->no_ktp = $request->no_ktp;
        $data->nip = $request->nip;
        $data->birthdate = $request->birthdate;
        $data->alamat = $request->alamat;
        $data->kota = $request->kota;
        $data->kodepos = $request->kodepos;
        $data->agama = $request->agama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_telpon = $request->no_telpon;
        $data->email = $request->email;
        $data->golongan = $request->golongan;
        $data->id_bank = $request->id_bank;
        $data->no_rekening = $request->no_rekening;
        $data->keterangan = $request->keterangan;
        $data->photo = $photo;
        $data->status = $request->status;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/peserta-aktif')->with('success', 'Berhasil menambah Peserta Aktif'.$data->name);
        }
    }

    public function getDetail($id)
    {
        $data = Kepesertaan::find($id);
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
        $data = Kepesertaan::find($id);
        if(isset($data))
        {
            return view('kepesertaan.peserta.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = Kepesertaan::find($id);
        $foto = $request->file('photo');
        if(isset($foto))
        {
            $destinationPath = 'foto/peserta';
            $foto->move($destinationPath, $foto->getClientOriginalName());
            $photo = $foto->getClientOriginalName();
            unlink(public_path('foto/peserta/'.$data->photo));
        }
        else
        {
            $photo = null;
        }

        $rules = [
            'email' => 'required|unique:kepesertaans,email,'.$id,
            'no_telpon' => 'required|unique:kepesertaans,no_telpon,'.$id,
            'no_ktp' => 'required|unique:kepesertaans,no_ktp,'.$id,
            'nip' => 'required|unique:kepesertaans,nip,'.$id,
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'no_telpon.unique' => 'No. Telepon tersebut sudah terdaftar.',
            'no_ktp.unique' => 'No. KTP sudah terdaftar',
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
            $data->no_ktp = $request->no_ktp;
            $data->nip = $request->nip;
            $data->birthdate = $request->birthdate;
            $data->alamat = $request->alamat;
            $data->kota = $request->kota;
            $data->kodepos = $request->kodepos;
            $data->agama = $request->agama;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->no_telpon = $request->no_telpon;
            $data->email = $request->email;
            $data->golongan = $request->golongan;
            $data->id_bank = $request->id_bank;
            $data->no_rekening = $request->no_rekening;
            $data->keterangan = $request->keterangan;
            $data->photo = $photo;
            $data->status = $request->status;

            $data->save();
            return redirect('kepesertaan/peserta-aktif')->with('success', 'Berhasil mengubah Peserta Aktif '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = Kepesertaan::find($id);
        if(isset($data))
        {
            unlink(public_path('foto/peserta/'.$data->photo));
            $data->delete();

            return redirect()->back()->with('success', 'Berhasil menghapus Peserta Aktif '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus Peserta Aktif');
        }
    }
}
