<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterUnitPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_unit_pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_unit');
            $table->string('name');
            $table->string('kode_group');
            $table->text('alamat');
            $table->string('kota');
            $table->integer('pos');
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
        Schema::dropIfExists('master_unit_pembayarans');
    }
}
