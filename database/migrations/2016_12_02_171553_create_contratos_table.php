<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_foraneo',90);
            $table->dateTime('fecha_inicio_garantia',90)->nullable()->default(null);
            $table->dateTime('fecha_fin_garantia',90)->nullable()->default(null);
            $table->string('refacciones',90);
            $table->string('refacciones_excepciones',90);
            $table->string('numeros_pagos',90);
            $table->string('limite_atencion',90);//numero de dias para atender reporte de servicio
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
        Schema::table('contratos', function (Blueprint $table) {
            //
            Schema::drop('contratos');
        });
    }
}
