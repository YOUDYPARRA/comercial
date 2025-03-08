<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CotizacionVenta extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
         $table->string('iniciales_vendedor_asignado',90);
         $table->string('fecha_factura',90);
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
        Schema::table('compras', function (Blueprint $table) {
            $table->dropColumn('iniciales_vendedor_asignado');
            $table->dropColumn('fecha_factura');
        });
    }
}
