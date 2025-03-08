<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTiemposServicioTiempoEspera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tiempos_servicio', function (Blueprint $table) {
            $table->string('espera',90)->after('viaje_horas');//Define el tiempo en espera, distinto al tiempo de trabajo expresado en minutos
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
         Schema::table('tiempos_servicio', function (Blueprint $table) {
             $table->dropColumn('espera');////Define el tiempo en espera, distinto al tiempo de trabajo expresado en minutos
        });
    }
}
