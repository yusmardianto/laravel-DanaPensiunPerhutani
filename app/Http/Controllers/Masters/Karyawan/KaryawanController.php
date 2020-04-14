<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Masters\Karyawan;
use Illuminate\Http\Request;
use DataTables, Validator, Hasher;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('masters.karyawan.index');
    }

    public function ajaxList()
    {
        $data = Karyawan::whereNotNull('created_at');

        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('masters/karyawan/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('masters/karyawan/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->name ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function getCreate()
    {
        return view('masters.karyawan.create');
    }

    public function postCreate(Request $request)
    {
        $foto = $request->file('photo');
        if(isset($foto))
        {
            $destinationPath = 'foto/karyawan';
            $foto->move($destinationPath, $foto->getClientOriginalName());
            $photo = $foto->getClientOriginalName();
        }
        else
        {
            $photo = null;
        }

        $rules = [
            'email' => 'required|unique:karyawans,email',
            'phonenumber' => 'required|unique:karyawans,phonenumber',
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

        $data = new Karyawan();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->birthdate = $request->birthdate;
        $data->phonenumber = $request->phonenumber;
        $data->address = $request->address;
        $data->photo = $photo;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/karyawan')->with('success', 'Berhasil menambah Karyawan '.$data->name);
        }
    }

    public function getDetail($id)
    {
        $data = Karyawan::find($id);
        if(isset($data))
        {
            return view('masters.karyawan.detail', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Karyawan tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $data = Karyawan::find($id);
        if(isset($data))
        {
            return view('masters.karyawan.edit', compact('data'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Karyawan tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = Karyawan::find($id);
        $foto = $request->file('photo');
        if(isset($foto))
        {
            $destinationPath = 'foto/karyawan';
            $foto->move($destinationPath, $foto->getClientOriginalName());
            $photo = $foto->getClientOriginalName();
            unlink(public_path('foto/karyawan/'.$data->photo));
        }
        else
        {
            $photo = null;
        }

        $rules = [
            'email' => 'required|unique:karyawans,email,'.$id,
            'phonenumber' => 'required|unique:karyawans,phonenumber,'.$id,
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

        $data->name = $request->name;
        $data->email = $request->email;
        $data->birthdate = $request->birthdate;
        $data->phonenumber = $request->phonenumber;
        $data->address = $request->address;
        $data->photo = $photo;

        if(isset($data))
        {
            $data->save();
            return redirect('masters/karyawan')->with('success', 'Berhasil mengubah Data Karyawan '.$data->name);
        }
    }

    public function destroy($id)
    {
        $data = Karyawan::find($id);
        if(isset($data))
        {
            unlink(public_path('/foto/karyawan/'.$data->photo));
            $data->delete();

            return redirect()->back()->with('success', 'Berhasil menghapus Data Karyawan '.$data->name);
        }
        else
        {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
