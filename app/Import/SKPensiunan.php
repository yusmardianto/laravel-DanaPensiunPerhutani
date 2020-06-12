<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SKPensirunanImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $rowData)
    {
        if (isset($data)) {
            return null;
        } else {
            return new SkPensiun([
                "jenis_trx"          => $rowData['jenis_trx'],
                "kode_peserta"       => $rowData['kode_peserta'],
                "nama_peserta"       => $rowData['nama_peserta'],
                "kode_voucher"       => $rowData['kode_voucher'],
                "nama_voucher"       => $rowData['nama_voucher'],
                "kode_unit_kerja"    => $rowData['kode_unit_kerja'],
                "nama_unit_kerja"    => $rowData['nama_unit_kerja'],
                "tanggal_pensiun"    => $rowData['tanggal_pensiun'],
                "no_trx_sk"          => $rowData['no_trx_sk'],
                "tgl_trx_sk"         => $rowData['tgl_trx_sk'],
                "no_sk_pensiun"      => $rowData['no_sk_pensiun'],
                "tgl_sk_pensiun"     => $rowData['tgl_sk_pensiun'],
                "no_sk_phk"          => $rowData['no_sk_phk'],
                "tgl_sk_phk"         => $rowData['tgl_sk_phk'],
                "keterangan"         => $rowData['keterangan']
            ]);
        }
    }
}

