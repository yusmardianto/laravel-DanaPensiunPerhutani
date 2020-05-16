<?php

namespace App\Models\Kepesertaan;

use Illuminate\Database\Eloquent\Model;

class ManfaatPensiunan extends Model
{
    public function u_bayar()
    {
        return $this->belongsTo('App\Models\Masters\UnitPembayaran', 'kode_unit');
    }

    public function kodeaktif()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif');
    }
}
