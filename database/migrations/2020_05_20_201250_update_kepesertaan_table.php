<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKepesertaanTable extends Migration
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
            $table->string('tempat_lahir');
            $table->date('birthdate');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->integer('tanggungan');
            $table->date('tgl_jadi_pegawai');
            $table->date('tgl_jadi_peserta');
            $table->date('mk_peserta');
            $table->integer('golongan');
            $table->string('golongan_gaji');
            $table->integer('status');
            $table->string('status_gaji');
            $table->string('pangkat');
            $table->string('email')->unique();
            $table->text('keterangan')->nullable();
            $table->boolean('is_active');
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
