<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoreksiManfaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koreksi_manfaats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_pensiun');
            $table->string('penerima');
            $table->string('no_trx');
            $table->string('tgl_pensiun');
            $table->string('tgl_pensiun_lama');
            $table->string('tgl_mp_dibayar');
            $table->string('tgl_mp_turunan');
            $table->string('kd_unit_usaha');
            $table->string('alasan');
            $table->string('jenis_pensiun');
            $table->string('gaji_pokok');
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
        Schema::dropIfExists('koreksi_manfaats');
    }
}
