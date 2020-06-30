<?php

namespace App\Imports;

use App\Models\Kepesertaan\ManfaatPensiunan\RapelExtraManfaat as AppManfaat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RapelManfaatImport implements ToCollection,WithStartRow
{
    /**
    * @param Collection $collection
    */

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            AppManfaat::create([
                'jenis_transaksi' => $row[2],
                'kode_voucher' => $row[3],
                'no_trx' => $row[4],
                'tgl_trx' => $this->transformDate($row[5]) ,
                'no_daftar_bayar_MP' => $row[6],
                'kode_pensiun' => $row[7],
                'nama' => $row[8],
                'berlaku_dari' =>  $this->transformDate($row[9]) ,
                'berlaku_sampai' =>  $this->transformDate($row[10]),
                'pph21' => $row[11],
                'nonpph21' => $row[12],
                'keterangan' => $row[13],
            ]);
        }
    }

    public function startRow(): int
    {
        return 10;
    }
}
