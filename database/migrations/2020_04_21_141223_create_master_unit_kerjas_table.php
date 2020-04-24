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
            $table->integer('kd_unit');
            $table->string('name');
            $table->string('pejabat')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('kota')->nullable();
            $table->integer('kd_pos')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('telepon')->nullable()->unique();
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
        Schema::dropIfExists('master_unit_kerjas');
    }
}
