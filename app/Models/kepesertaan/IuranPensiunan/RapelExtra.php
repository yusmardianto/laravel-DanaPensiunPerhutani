<?php

namespace App\Models\Kepesertaan\IuranPensiunan;

use Illuminate\Database\Eloquent\Model;

class RapelExtra extends Model
{
    protected $fillable = [
        'kd_voucher', 'no_transaksi', 'tgl_transaksi', 'kd_peserta', 'nama_peserta', 'berlaku_dari', 'berlaku_sampai', 'gaji_pokok', 'phdp', 'beban_peserta', 'beban_pemberikerja', 'total_rapel', 'keterangan'
    ];

    public function vocer()
    {
        return $this->belongsTo('App\Models\Masters\MasterVoucher', 'kode_voucher', 'kd_voucher');
    }
    public function peserta()
    {
        return $this->belongsTo('App\Models\Kepesertaan\Kepesertaan', 'kode_aktif', 'kd_peserta');
    }
}
