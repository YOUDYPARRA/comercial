<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Custodias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custodias', function (Blueprint $table) {
            //
            $table->string('id_reporte',90);
            $table->string('id_clase',90);
            $table->string('reporte',90);
            $table->string('accesorios',90);
            $table->string('transductores',90);
            $table->string('cables',90);
            $table->string('empaques',90);
            $table->string('digitalizacion',90);
            $table->string('otros',90);
            $table->increments('id');
            $table->softDeletes();
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
        Schema::table('custodias', function (Blueprint $table) {
            //
            Schema::drop('custodias');
        });
    }
}
