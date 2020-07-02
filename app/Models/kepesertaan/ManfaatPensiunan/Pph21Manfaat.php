<?php

namespace App\Models\Kepesertaan\ManfaatPensiunan;

use Illuminate\Database\Eloquent\Model;

class Pph21Manfaat extends Model
{
    public function peserta()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif', 'kd_peserta');
    }
}
