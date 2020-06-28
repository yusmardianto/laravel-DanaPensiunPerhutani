<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMasterAlasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('master_alasan_pensiuns');

        Schema::create('master_alasan_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('name')->nullable();
            $table->integer('syarat_pensiun')->nullable();
            $table->integer('formula_mp')->nullable();
            $table->integer('jenis_sk')->nullable();
            $table->integer('jenis_pensiun')->nullable();
            $table->integer('jenis_sisa_mk')->nullable();
            $table->integer('usia_faktor_sekarang')->nullable();
            $table->integer('usia_faktor_sekaligus')->nullable();
            $table->integer('kode_aktuaria')->nullable();
            $table->integer('created_by')->nullable();
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
