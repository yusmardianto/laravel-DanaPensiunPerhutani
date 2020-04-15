<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepesertaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepesertaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('no_ktp');
            $table->string('nip');
            $table->text('alamat');
            $table->text('alamat');
            $table->string('kodepos');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('no_telpon');
            $table->string('email');
            $table->string('golongan');
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
        Schema::dropIfExists('kepesertaan');
    }
}
