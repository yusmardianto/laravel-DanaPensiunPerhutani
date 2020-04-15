<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pesertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_card');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birthdate');
            $table->bigInteger('phonenumber')->unique();
            $table->text('address');
            $table->string('photo');
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
        Schema::dropIfExists('master_pesertas');
    }
}
