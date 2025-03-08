<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('cotizaciones_paquetes_insumos', 'id_insumo_prestamo')) {
        Schema::table('cotizaciones_paquetes_insumos', function (Blueprint $table) {
            $table->string('id_insumo_prestamo',90);//SIN OBSERVACION
            //
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizaciones_paquetes_insumos', function (Blueprint $table) {
            Schema::dropColumn('id_insumo_prestamo',90);//
            //
        });
    }
}
