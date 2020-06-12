<?php

namespace App\Models\Kepesertaan\SkPensiun;

use Illuminate\Database\Eloquent\Model;

class SkPensiun extends Model
{
    protected $fillable = 'is_active' ;

    public function u_kerja()
    {
        return $this->belongsTo('App\Models\Masters\UnitKerja', 'unit_kerja');
    }

    public function vocher()
    {
        return $this->belongsTo('App\Models\Masters\Voucher', 'voucher');
    }

    public function period()
    {
        return $this->belongsTo('App\Models\Masters\Periode', 'periode');
    }

    public function kodeaktif()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif');
    }
}
