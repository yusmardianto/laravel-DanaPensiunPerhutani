<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kepesertaan\SkPensiun\SkPensiun;
use App\Models\Masters\MasterPeriode;
use App\Models\Masters\MasterVoucher;
use App\Models\Masters\MasterUnitKerja;
use App\Models\Kepesertaan\Kepesertaan;
use DataTables, Hasher, Validator;

class SKPensiunanController extends Controller
{
    public function index(Request $request)
    {
        return view('kepesertaan.skpensiunan.transaksiskpensiun.index');
    }

    public function getCreate(Request $request)
    {
        $periode = MasterPeriode::all();
        $voucher = MasterVoucher::all();
        $unit_kerja = MasterUnitKerja::all();
        $kodeaktif = Kepesertaan::all();
        return view('kepesertaan.skpensiunan.transaksiskpensiun.create', compact('kodeaktif','periode','voucher','unit_kerja'));
    }

    public function ajaxList()
    {
        $data = SkPensiun::whereNotNull('created_at');
        $datatables = Datatables::of($data);
        return $datatables->addColumn('action', function ($row) {
            $hashed_id = Hasher::encode($row->id);
                return "
                <a class=\"btn btn-xs btn-info\" href=\"". url('kepesertaan/skpensiunan/transaksiskpensiun/detail/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-eye-open\"></i> Detail</a>
                <a class=\"btn btn-xs btn-primary\" href=\"". url('kepesertaan/skpensiunan/transaksiskpensiun/edit/'.$hashed_id) ."\"><i class=\"glyphicon glyphicon-edit\"></i> Ubah</a>
                <a class=\"btn btn-xs btn-warning delete-btn\" href=\"#\" data-id=\"". $hashed_id ."\" data-name=\"". $row->no_sk_pensiun ."\"><i class=\"glyphicon glyphicon-trash\"></i> Hapus</a>
                ";
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    public function postCreate(Request $request)
    {
        $peserta_aktif = $request->kode_aktif;
        $arr_aktif = explode(' - ', $peserta_aktif);

        $voucher = $request->voucher;
        $arr_voucher = explode(' - ', $voucher);

        $unit_kerja = $request->unit_kerja;
        $arr_unit_kerja = explode(' - ', $unit_kerja);

        $rules = [
            'no_trx_sk' => 'required|unique:sk_pensiuns,no_trx_sk',
        ];

        $messages = [
            'no_trx_sk.unique' => 'Nomer Transaksi SK Pensiun tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }

        $data = new SkPensiun();
        $data->jenis_transaksi = $request->jenis_transaksi;
        $data->kode_peserta = $arr_aktif[0];
        $data->nama_peserta = $arr_aktif[1];
        $data->kode_voucher = $arr_voucher[0];
        $data->nama_voucher = $arr_voucher[1];
        $data->kode_unit_kerja = $arr_unit_kerja[0];
        $data->nama_unit_kerja = $arr_unit_kerja[1];
        $data->tanggal_pensiun = $request->tanggal_pensiun;
        $data->no_trx_sk = $request->no_trx_sk;
        $data->tgl_trx_sk = $request->tgl_trx_sk;
        $data->no_sk_pensiun = $request->no_sk_pensiun;
        $data->tgl_sk_pensiun = $request->tgl_sk_pensiun;
        $data->no_sk_phk = $request->no_sk_phk;
        $data->tgl_sk_phk = $request->tgl_sk_phk;
        $data->keterangan = $request->keterangan;

        if(isset($data))
        {
            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil menambah SK Pensiunan '.$data->no_sk_pensiun);
        }
    }

    public function postImport(Request $request)
    {
        set_time_limit(0);
        $file = $request->file('sk_file');
        $mimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/tsv');

        if ($request->hasFile('sk_file')) {
            if (in_array($file->getMimeType(), $mimes)) {
                try {
                    // $data = Excel::import(new NewcomerImport, $file);
                    $array = Excel::toArray(new NewcomerImport, $file);
                    $error = 0;
                    $success = 0;

                    // return $array[0];

                    foreach ($array[0] as $rowData) {
                        $dataSK = [
                            "jenis_trx"          => (isset($rowData['jenis_trx']) ? $rowData['jenis_trx'] : ''),
                            "kode_peserta"       => (isset($rowData['kode_peserta']) ? $rowData['kode_peserta'] : ''),
                            "nama_peserta"       => (isset($rowData['nama_peserta']) ? $rowData['nama_peserta'] : ''),
                            "kode_voucher"       => (isset($rowData['kode_voucher']) ? $rowData['kode_voucher'] : ''),
                            "nama_voucher"       => (isset($rowData['nama_voucher']) ? $rowData['nama_voucher'] : ''),
                            "kode_unit_kerja"    => (isset($rowData['kode_unit_kerja']) ? $rowData['kode_unit_kerja'] : null),
                            "nama_unit_kerja"    => (isset($rowData['nama_unit_kerja']) ? $rowData['nama_unit_kerja'] : ''),
                            "tanggal_pensiun"    => (isset($rowData['tanggal_pensiun']) ? $rowData['tanggal_pensiun'] : null),
                            "no_trx_sk"          => (isset($rowData['no_trx_sk']) ? $rowData['no_trx_sk'] : ''),
                            "tgl_trx_sk"         => (isset($rowData['tgl_trx_sk']) ? $rowData['tgl_trx_sk'] : null),
                            "no_sk_pensiun"      => (isset($rowData['no_sk_pensiun']) ? $rowData['no_sk_pensiun'] : ''),
                            "tgl_sk_pensiun"     => (isset($rowData['tgl_sk_pensiun']) ? $rowData['tgl_sk_pensiun'] : null),
                            "no_sk_phk"          => (isset($rowData['no_sk_phk']) ? $rowData['no_sk_phk'] : ''),
                            "tgl_sk_phk"         => (isset($rowData['tgl_sk_phk']) ? $rowData['tgl_sk_phk'] : null),
                            "keterangan"         => (isset($rowData['keterangan']) ? $rowData['keterangan'] : null)
                        ];

                        // return $dataNewcomer;

                        if (isset($rowData)) {
                            // return $rowData;
                            if (!isset($data)) {
                                $data = new SkPensiun();
                                $data->jenis_transaksi = $dataSK['jenis_trx'];
                                $data->kode_peserta = $dataSK['kode_peserta'];
                                $data->nama_peserta = $dataSK['nama_peserta'];
                                $data->kode_voucher = $dataSK['kode_voucher'];
                                $data->nama_voucher = $dataSK['nama_voucher'];
                                $data->kode_unit_kerja = $dataSK['kode_unit_kerja'];
                                $data->nama_unit_kerja = $dataSK['nama_unit_kerja'];
                                $data->tanggal_pensiun = $dataSK['tanggal_pensiun'];
                                $data->no_trx_sk = $dataSK['no_trx_sk'];
                                $data->tgl_trx_sk = $dataSK['tgl_trx_sk'];
                                $data->no_sk_pensiun = $dataSK['no_sk_pensiun'];
                                $data->tgl_sk_pensiun = $dataSK['tgl_sk_pensiun'];
                                $data->no_sk_phk = $dataSK['no_sk_phk'];
                                $data->tgl_sk_phk = $dataSK['tgl_sk_phk'];
                                $data->keterangan = $dataSK['keterangan'];

                                if ($data->save()) {
                                    return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil Import File SK Pensiunan ');
                                    $success++;
                                } else {
                                    $error++;
                                }
                            } else {
                                $error++;
                            }
                        } else {
                            $error++;
                        }
                    }

                    if ($error > 0) {
                        return redirect()->back()->with('warning', 'terdapat ' . $success . ' data input berhasil, dan ' . $error . ' data yang tidak berhasil di input');
                    } else {
                        return redirect()->back()->with('success', 'All good!');
                    }
                } catch (Exception $error) {
                    return redirect()->back()->with('error', $error->getMessage());
                }
            } else {
                return redirect()->back()->with('error', 'format file salah');
            }
        }
    }


    public function getDetail($id)
    {
        $periode = MasterPeriode::all();
        $voucher = MasterVoucher::all();
        $unit_kerja = MasterUnitKerja::all();
        $kodeaktif = Kepesertaan::all();
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.transaksiskpensiun.detail', compact('kodeaktif','data','periode','voucher','unit_kerja'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function getEdit($id)
    {
        $periode = MasterPeriode::all();
        $voucher = MasterVoucher::all();
        $unit_kerja = MasterUnitKerja::all();
        $kodeaktif = Kepesertaan::all();
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return view('kepesertaan.skpensiunan.transaksiskpensiun.edit', compact('kodeaktif','data','periode','voucher','unit_kerja'));
        }
        else
        {
            return redirect()->back()->with('error', 'Data Peserta Aktif tidak ditemukan');
        }
    }

    public function postEdit(Request $request, $id)
    {
        $data = SkPensiun::find($id);

        $rules = [
            'no_trx_sk' => 'required|unique:sk_pensiuns,no_trx_sk,'.$id,
        ];

        $messages = [
            'no_trx_sk.unique' => 'Nomer Transaksi SK Pensiun tersebut sudah terdaftar.',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->withErrors($error)->withInput();
        }
        else
        {
            $peserta_aktif = $request->kode_aktif;
            $arr_aktif = explode(' - ', $peserta_aktif);

            $voucher = $request->voucher;
            $arr_voucher = explode(' - ', $voucher);

            $unit_kerja = $request->unit_kerja;
            $arr_unit_kerja = explode(' - ', $unit_kerja);

            $data = new SkPensiun();
            $data->jenis_transaksi = $request->jenis_transaksi;
            $data->kode_peserta = $arr_aktif[0];
            $data->nama_peserta = $arr_aktif[1];
            $data->kode_voucher = $arr_voucher[0];
            $data->nama_voucher = $arr_voucher[1];
            $data->kode_unit_kerja = $arr_unit_kerja[0];
            $data->nama_unit_kerja = $arr_unit_kerja[1];
            $data->tanggal_pensiun = $request->tanggal_pensiun;
            $data->no_trx_sk = $request->no_trx_sk;
            $data->tgl_trx_sk = $request->tgl_trx_sk;
            $data->no_sk_pensiun = $request->no_sk_pensiun;
            $data->tgl_sk_pensiun = $request->tgl_sk_pensiun;
            $data->no_sk_phk = $request->no_sk_phk;
            $data->tgl_sk_phk = $request->tgl_sk_phk;
            $data->keterangan = $request->keterangan;

            $data->save();
            return redirect('kepesertaan/skpensiunan/transaksiskpensiun')->with('success', 'Berhasil mengubah SK Pensiun '.$data->no_sk_pensiun);
        }
    }

    public function destroy($id)
    {
        $data = SkPensiun::find($id);
        if(isset($data))
        {
            return redirect()->back()->with('success', 'Berhasil menghapus SK Pensiunan '.$data->no_sk_pensiun);
        }
        else
        {
            return redirect()->back()->with('error', 'Gagal menghapus SK Pensiunan');
        }
    }
}
