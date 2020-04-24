<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAlasanPensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_alasan_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('name');
            $table->integer('syarat_pensiun');
            $table->integer('formula_mp');
            $table->integer('jenis_sk');
            $table->integer('jenis_pensiun');
            $table->integer('jenis_sisa_mk');
            $table->integer('usia_faktor_sekarang');
            $table->integer('usia_faktor_sekaligus');
            $table->integer('kode_aktuaria');
            $table->integer('created_by');
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
        Schema::dropIfExists('master_alasan_pensiuns');
    }
}
