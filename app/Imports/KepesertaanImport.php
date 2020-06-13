<?php

namespace App\Imports;

use App\Models\Kepesertaan\Kepesertaan as AppKepesertaan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KepesertaanImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            if($row[10] > $row[9])
            {
                $phdp = $row[10]-$row[9];
                $iuran = $phdp*0.05;
            }
            else
            {
                $phdp = $row[9]-$row[10];
                $iuran = $phdp*0.05;
            }

            AppKepesertaan::create([
                'kode_aktif' => $row[2],
                'nip' => $row[3],
                'nama' => $row[4],
                'unit_kerja' => $row[5],
                'mutasi_dari' => $row[6],
                'golongan' => $row[7],
                'tanggungan' => $row[8],
                'gaji_pokok' => $row[9],
                'gaji_pns' => $row[10],
                'phdp' => $phdp,
                'iuran' => $iuran,
                'is_active' => 1,
            ]);
        }
    }

    public function startRow(): int
    {
        return 10;
    }
}
