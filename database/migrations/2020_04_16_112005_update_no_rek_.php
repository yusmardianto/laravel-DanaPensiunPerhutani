<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNoRek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kepesertaans', function (Blueprint $table) {
            $table->string('id_bank')->after('golongan');
            $table->string('no_rekening')->after('id_bank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kepesertaans', function (Blueprint $table) {
            $table->dropColumn('no_rekening');
            $table->dropColumn('id_bank');
        });
    }
}
