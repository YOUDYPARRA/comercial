<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCotizacionFacturaEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            //
            $table->string('id_condicion_factura',90);//
         $table->string('id_metodo_envio',90);//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            //
        Schema::dropColumn('id_condicion_factura',90);//
         Schema::dropColumn('id_metodo_envio',90);//
        });
    }
}
