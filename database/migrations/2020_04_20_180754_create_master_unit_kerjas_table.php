<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterUnitKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_unit_kerjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kode_unit_kerja');
            $table->string('nama_unit_kerja');
            $table->string('pejabat');
            $table->text('alamat');
            $table->string('kota');
            $table->integer('kode_pos');
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
        Schema::dropIfExists('master_unit_kerjas');
    }
}
