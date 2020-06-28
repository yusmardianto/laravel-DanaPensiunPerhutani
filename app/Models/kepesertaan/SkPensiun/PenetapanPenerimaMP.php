<?php

namespace App\Models\kepesertaan\SkPensiun;

use Illuminate\Database\Eloquent\Model;

class PenetapanPenerimaMP extends Model
{
    public function kodeaktif()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif');
    }

    public function regency()
    {
        return $this->belongsTo('App\Models\Regencies', 'tempat_lahir', 'name');
    }
}
