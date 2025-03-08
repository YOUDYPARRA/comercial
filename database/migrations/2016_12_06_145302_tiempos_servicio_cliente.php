<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TiemposServicioCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tiempos_servicio', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->string('id_foraneo',90);//id del servicio
            $table->string('manana_entrada',90);
            $table->string('manana_salida',90);
            $table->string('tarde_entrada',90);
            $table->string('tarde_salida',90);
            $table->string('trabajo_horas',90);
            $table->string('viaje_horas',90);
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
        //
        Schema::drop('tiempos_servicio');
    }
}
