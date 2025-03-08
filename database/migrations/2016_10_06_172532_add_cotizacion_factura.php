<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCotizacionFactura extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
         $table->string('fecha_factura',90);//
         $table->string('iniciales_asignado',90);//

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
        Schema::table('cotizaciones', function (Blueprint $table) {
            Schema::dropColumn('fecha_factura',90);//
         Schema::dropColumn('iniciales_asignado',90);//
        });
    }
}
