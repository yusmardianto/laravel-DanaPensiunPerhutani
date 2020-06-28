<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenetapanPenerimaMPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penetapan_penerima_m_p_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_aktif');
            $table->string('penerima');
            $table->bigInteger('no_kk');
            $table->date('tgl_kk');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat_tinggal');
            $table->string('kota_tinggal');
            $table->bigInteger('pos_tinggal');
            $table->string('alamat_domisili');
            $table->string('kota_domisili');
            $table->bigInteger('pos_domisili');
            $table->bigInteger('nik');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penetapan_penerima_m_p_s');
    }
}
