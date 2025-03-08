<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdInsumoCompraVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('cotizaciones_paquetes_insumos', 'id_prestamo')) {
            Schema::table('cotizaciones_paquetes_insumos', function (Blueprint $table) {
                $table->string('id_prestamo',90);
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
            //
        });
    }
}
