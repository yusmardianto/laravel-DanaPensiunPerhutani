<?php

namespace App\Models\Kepesertaan\ManfaatPensiunan;

use Illuminate\Database\Eloquent\Model;

class RapelExtraManfaat extends Model
{

    protected $fillable = ['jenis_transaksi', 'kode_voucher', 'no_trx', 'tgl_trx', 'no_daftar_bayar_MP', 'kode_pensiun', 'nama','berlaku_dari', 'berlaku_sampai', 'pph21', 'nonpph21', 'keterangan'
    ];
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
