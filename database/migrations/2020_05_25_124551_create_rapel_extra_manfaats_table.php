<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapelExtraManfaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapel_extra_manfaats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_transaksi');
            $table->string('kode_voucher');
            $table->string('no_trx');
            $table->date('tgl_trx');
            $table->string('no_daftar_bayar_MP');
            $table->string('kode_pensiun');
            $table->string('nama');
            $table->date('berlaku_dari');
            $table->date('berlaku_sampai');
            $table->bigInteger('pph21');
            $table->bigInteger('nonpph21');
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
        Schema::dropIfExists('rapel_extra_manfaats');
    }
}
