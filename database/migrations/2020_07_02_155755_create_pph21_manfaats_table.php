<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePph21ManfaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pph21_manfaats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pensiun')->unique();
            $table->string('nama');
            $table->string('nama_perusahaan_lama');
            $table->string('npwp_perusahaan_lama');
            $table->string('netto');
            $table->bigInteger('pph21');
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
        Schema::dropIfExists('pph21_manfaats');
    }
}
