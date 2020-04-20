<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkPensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_sk_pensiun');
            $table->date('tanggal_pensiun');
            $table->bigInteger('periode');
            $table->string('voucher');
            $table->string('tanggungan');
            $table->string('unit_kerja');
            $table->bigInteger('npwp');
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
        Schema::dropIfExists('sk_pensiuns');
    }
}
