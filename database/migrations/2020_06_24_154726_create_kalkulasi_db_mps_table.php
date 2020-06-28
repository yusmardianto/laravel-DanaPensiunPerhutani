<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKalkulasiDbMpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kalkulasi_db_mps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_trx');
            $table->string('kd_pensiun');
            $table->string('penerima');
            $table->string('alasan');
            $table->string('kd_unit_usaha');
            $table->string('pembayaran');
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
        Schema::dropIfExists('kalkulasi_db_mps');
    }
}
