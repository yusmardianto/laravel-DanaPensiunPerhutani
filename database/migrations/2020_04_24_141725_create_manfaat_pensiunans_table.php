<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManfaatPensiunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manfaat_pensiunans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_transaksi');
            $table->string('kode_aktif');
            $table->string('kd_rapel');
            $table->string('alasan');
            $table->string('kode_unit');
            $table->bigInteger('nilai_manfaat');
            $table->bigInteger('tunjangan_pph');
            $table->bigInteger('biaya_pensiun');
            $table->bigInteger('penghasilan_kenapajak');
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
        Schema::dropIfExists('manfaat_pensiunans');
    }
}
