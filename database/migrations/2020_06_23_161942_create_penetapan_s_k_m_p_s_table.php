<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenetapanSKMPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penetapan_s_k_m_p_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('penangguhan_dari')->nullable();
            $table->date('penangguhan_sampai')->nullable();
            $table->date('mkp_dari')->nullable();
            $table->date('mkp_sampai')->nullable();
            $table->string('kode_peserta');
            $table->string('nama_peserta');
            $table->string('kode_alasan');
            $table->string('nama_alasan');
            $table->date('tgl_alasan')->nullable();
            $table->string('kode_unit_pembayaran');
            $table->string('nama_unit_pembayaran');
            $table->date('tgl_mpbayar')->nullable();
            $table->date('tgl_mpturun')->nullable();
            $table->bigInteger('mp_sekaligus')->nullable();
            $table->bigInteger('mp_pertama')->nullable();
            $table->bigInteger('mp_bulanan')->nullable();
            $table->string('no_rek_lain')->nullable();
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
        Schema::dropIfExists('penetapan_s_k_m_p_s');
    }
}
