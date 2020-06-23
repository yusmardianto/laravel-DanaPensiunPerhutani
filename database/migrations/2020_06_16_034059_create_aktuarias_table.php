<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktuariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktuarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_aktuaria');
            $table->string('kd_mortalita');
            $table->string('asumsi')->nullable();
            $table->string('usia_X')->nullable();
            $table->string('usia_Y')->nullable();

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
        Schema::dropIfExists('aktuarias');
    }
}
