<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\MasterPeserta;
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
        $data = MasterPeserta::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/peserta/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/peserta/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.peserta.create');
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
            'email' => 'required|unique:master_pesertas,email',
            'phonenumber' => 'required|unique:master_pesertas,phonenumber',
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'phonenumber.unique' => 'No. Telepon tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new MasterPeserta();
        $data->id_card = $request->id_card;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->birthdate = $request->birthdate;
        $data->phonenumber = $request->phonenumber;
        $data->address = $request->address;
        $data->photo = $photo;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/peserta')->with('success', 'Berhasil menambah Peserta '.$data->name);
        }
    }

    public function getDetail($id)
    {
        $data = MasterPeserta::find($id);
        if(isset($data))
        {
            return view('masters.peserta.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Master Peserta tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = MasterPeserta::find($id);
        if(isset($data))
        {
            return view('masters.peserta.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Master Peserta tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = MasterPeserta::find($id);
        $foto = $request->file('photo');
        if(isset($foto))
        {
            $destinationPath = 'foto/masterpeserta';
            $foto->move($destinationPath, $foto->getClientOriginalName());
            $photo = $foto->getClientOriginalName();
            unlink(public_path('foto/masterpeserta/'.$data->photo));
        }
        else
        {
            $photo = null;
        }

        $rules = [
            'email' => 'required|unique:master_pesertas,email',
            'phonenumber' => 'required|unique:master_pesertas,phonenumber',
        ];

        $messages = [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'phonenumber.unique' => 'No. Telepon tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data->id_card = $request->id_card;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->birthdate = $request->birthdate;
        $data->phonenumber = $request->phonenumber;
        $data->address = $request->address;
        $data->photo = $photo;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/peserta')->with('success', 'Berhasil mengubah Peserta '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = MasterPeserta::find($id);
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
