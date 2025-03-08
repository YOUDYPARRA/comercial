<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCotizacionCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasColumn('compras_ventas', 'id_cotizacion')) {
    //
        Schema::table('compras_ventas', function (Blueprint $table) {
            $table->string('id_cotizacion',90);//
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
        //
        Schema::table('compras', function (Blueprint $table) {
             $table->dropColumn('id_cotizacion');//
        });
    }
}
