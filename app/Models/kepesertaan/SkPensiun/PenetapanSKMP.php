<?php

namespace App\Models\kepesertaan\SkPensiun;

use Illuminate\Database\Eloquent\Model;

class PenetapanSKMP extends Model
{
    public function kodeaktif()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif');
    }

    public function alasan()
    {
        return $this->belongsTo('App\Models\Masters\Alasan', 'alasan');
    }

    public function u_pembayaran()
    {
        return $this->belongsTo('App\Models\Masters\UnitPembayaran', 'unit_pembayaran');
    }
}
