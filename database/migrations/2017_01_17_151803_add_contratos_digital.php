<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContratosDigital extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contratos', function (Blueprint $table) {
            $table->string('digitalizacion',90);//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('contratos', function (Blueprint $table) {
             $table->dropColumn('digitalizacion');//
        });
    }
}
