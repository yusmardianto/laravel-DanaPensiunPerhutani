<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\ManfaatPensiunan\KoreksiManfaat;
use App\Models\Kepesertaan\Kepesertaan;
use DataTables, Hasher, Validator;

class KoreksiManfaatController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.manfaatpensiunan.koreksimanfaat.index');
    }

    public function getCreate(Request $request)
    {
        return view('kepesertaan.manfaatpensiunan.koreksimanfaat.create');
    }

    public function postCreate(Request $request)
    {
        $rules = [
            'kode_pensiun' => 'required|unique:kalkulasi_manfaats,kode_pensiun',
        ];

        $messages = [
            'kode_pensiun.unique' => 'Kode Pensiun sudah ada',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if ($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
            $peserta = $request->kode_pensiun;
            $arr_peserta = explode(' - ', $peserta);

            $data = new Pph21Manfaat();
            $data->kode_pensiun = $arr_peserta[0];
            $data->nama = $arr_peserta[1];
            $data->nama_perusahaan_lama = $request->nama_perusahaan_lama;
            $data->npwp_perusahaan_lama = $request->npwp_perusahaan_lama;
            $data->netto = $request->netto;
            $data->pph21 = $request->pph21;
            $data->keterangan = $request->keterangan;

            if (isset($data)) {
                $data->save();
                return redirect('kepesertaan/manfaatpensiunan/pph21manfaat')->with('success', 'Berhasil menambah PPH 21 Manfaat Pensiunan ');
            }
        }

    public function destroy($id)
    {
        $data = RapelExtraManfaat::find($id);
        if (isset($data)) {

            $data->delete();

            return redirect('kepesertaan/manfaatpensiunan/rapelextramanfaat')->with('success', 'Berhasil menghapus data transaksi ');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
