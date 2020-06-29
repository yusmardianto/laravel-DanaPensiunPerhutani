<?php

namespace App\Imports;

use App\Models\Kepesertaan\IuranPensiunan\RapelExtra as AppRapelIuran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RapelIuranImport implements ToCollection, WithStartRow
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
            $cek = AppRapelIuran::where('kd_peserta', $row[4])->first();
            if(isset($cek))
            {
                AppRapelIuran::where('kd_peserta', $row[4])->update([
                    'no_transaksi' => $row[2],
                    'tgl_transaksi' => $this->transformDate($row[3]) ,
                    'kd_peserta' => $row[4],
                    'nama_peserta' => $row[5],
                    'berlaku_dari' => $this->transformDate($row[6]) ,
                    'berlaku_sampai' => $this->transformDate($row[7]),
                    'gaji_pokok' => $row[8],
                    'phdp' => $row[9],
                    'beban_peserta' => $row[10],
                    'beban_pemberikerja' => $row[11],
                    'total_rapel' => $row[12],
                    'keterangan' => $row[13],
                ]);
            }
            else
            {
                AppRapelIuran::create([
                    'no_transaksi' => $row[2],
                    'tgl_transaksi' => $this->transformDate($row[3]) ,
                    'kd_peserta' => $row[4],
                    'nama_peserta' => $row[5],
                    'berlaku_dari' => $this->transformDate($row[6]) ,
                    'berlaku_sampai' => $this->transformDate($row[7]),
                    'gaji_pokok' => $row[8],
                    'phdp' => $row[9],
                    'beban_peserta' => $row[10],
                    'beban_pemberikerja' => $row[11],
                    'total_rapel' => $row[12],
                    'keterangan' => $row[13],
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 10;
    }
}
