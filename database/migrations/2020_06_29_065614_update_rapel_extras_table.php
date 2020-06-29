<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRapelExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('rapel_extras');

        Schema::create('rapel_extras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi');
            $table->date('tgl_transaksi');
            $table->string('kd_peserta');
            $table->string('nama_peserta');
            $table->date('berlaku_dari');
            $table->date('berlaku_sampai');
            $table->string('gaji_pokok');
            $table->string('phdp');
            $table->string('beban_peserta');
            $table->string('beban_pemberikerja');
            $table->string('total_rapel');
            $table->text('keterangan')->nullable();
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
        Schema::drop('rapel_extras');
    }
}
