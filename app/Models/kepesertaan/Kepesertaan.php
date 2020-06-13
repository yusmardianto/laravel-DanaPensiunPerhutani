<?php

namespace App\Models\Kepesertaan;

use Illuminate\Database\Eloquent\Model;

class Kepesertaan extends Model
{
    protected $fillable = [
        'kode_aktif', 'nama', 'nip', 'unit_kerja', 'mutasi_dari', 'tempat_lahir', 'birthdate', 'jenis_kelamin', 'agama', 'tanggungan', 'tgl_jadi_pegawai', 'tgl_jadi_peserta', 'mk_peserta', 'golongan', 'golongan_gaji', 'status', 'status_gaji', 'gaji_pokok', 'gaji_pns', 'phdp', 'iuran', 'pangkat', 'email', 'keterangan', 'is_active'
    ];
    public function gol()
    {
        return $this->belongsTo('App\Models\Masters\MasterGolongan', 'golongan', 'name');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\Masters\MasterBank', 'id_bank', 'kd_bank');
    }

    public function sk()
    {
        return $this->belongsTo('App\Models\Kepesertaan\SkPensiun\SkPensiun', 'kode_aktif', 'kode_peserta');
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
        return $this->belongsTo('App\Models\Masters\MasterStatus', 'status', 'name');
    }
}
