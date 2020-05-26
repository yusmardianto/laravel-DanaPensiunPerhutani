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

    public function regency()
    {
        return $this->belongsTo('App\Models\Regencies', 'tempat_lahir');
    }

    public function jeniskelamin()
    {
        return $this->belongsTo('App\Models\Gender', 'jenis_kelamin', 'kode');
    }

    public function religi()
    {
        return $this->belongsTo('App\Models\Religion', 'agama');
    }

    public function stat()
    {
        return $this->belongsTo('App\Models\Masters\MasterStatus', 'status');
    }
}
