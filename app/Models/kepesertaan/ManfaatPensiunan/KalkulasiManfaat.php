<?php

namespace App\Models\Kepesertaan\ManfaatPensiunan;

use Illuminate\Database\Eloquent\Model;

class KalkulasiManfaat extends Model
{
    public function u_bayar()
    {
        return $this->belongsTo('App\Models\Masters\UnitPembayaran', 'kode_unit');
    }
        public function voucher()
    {
        return $this->belongsTo('App\Models\Masters\Voucher', 'kode_voucher','jenis_transaksi');
    }

    public function kodeaktif()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif');
    }
}
