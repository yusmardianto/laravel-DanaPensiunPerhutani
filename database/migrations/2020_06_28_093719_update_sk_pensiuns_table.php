<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSkPensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('sk_pensiuns');

        Schema::create('sk_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_transaksi');
            $table->string('kode_peserta');
            $table->string('nama_peserta');
            $table->string('kode_voucher');
            $table->string('nama_voucher');
            $table->string('kode_unit_kerja');
            $table->string('nama_unit_kerja');
            $table->date('tanggal_pensiun')->nullable();
            $table->string('no_trx_sk')->nullable();
            $table->date('tgl_trx_sk')->nullable();
            $table->string('no_sk_pensiun')->nullable();
            $table->date('tgl_sk_pensiun')->nullable();
            $table->string('no_sk_phk')->nullable();
            $table->date('tgl_sk_phk')->nullable();
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
        //
    }
}
