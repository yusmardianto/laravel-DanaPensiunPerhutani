<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkPensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_transaksi');                                                          
            $table->string('kode_peserta');
            $table->string('nama_peserta');
            $table->string('kode_voucher');
            $table->string('nama_voucher');
            $table->string('kode_unit_kerja');
            $table->string('nama_unit_kerja');
            $table->date('tanggal_pensiun');
            $table->string('no_trx_sk');
            $table->date('tgl_trx_sk');                                 
            $table->string('no_sk_pensiun');
            $table->date('tgl_sk_pensiun');
            $table->string('no_sk_phk');
            $table->date('tgl_sk_phk');
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
        Schema::dropIfExists('sk_pensiuns');
    }
}
