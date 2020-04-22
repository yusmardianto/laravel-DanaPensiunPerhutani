<?php

namespace App\Models\Kepesertaan;

use Illuminate\Database\Eloquent\Model;

class Kepesertaan extends Model
{
    public function gol()
    {
        return $this->belongsTo('App\Models\Masters\MasterGolongan', 'golongan');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\Masters\MasterBank', 'id_bank', 'kd_bank');
    }

    public function sk()
    {
        return $this->belongsTo('App\Models\Kepesertaan\SkPensiun', 'kode_aktif', 'kode_aktif');
    }
}
