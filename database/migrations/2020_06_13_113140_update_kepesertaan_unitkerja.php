<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKepesertaanUnitkerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('kepesertaans');

        Schema::create('kepesertaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_aktif');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->integer('unit_kerja');
            $table->integer('mutasi_dari')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('tanggungan')->nullable();
            $table->date('tgl_jadi_pegawai')->nullable();
            $table->date('tgl_jadi_peserta')->nullable();
            $table->date('mk_peserta')->nullable();
            $table->string('golongan')->nullable();
            $table->string('golongan_gaji')->nullable();
            $table->string('status')->nullable();
            $table->string('status_gaji')->nullable();
            $table->bigInteger('gaji_pokok')->nullable();
            $table->bigInteger('gaji_pns')->nullable();
            $table->bigInteger('phdp')->nullable();
            $table->bigInteger('iuran')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::drop('kepesertaans');
    }
}
