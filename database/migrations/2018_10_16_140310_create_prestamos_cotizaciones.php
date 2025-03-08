<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosCotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('prestamos_cotizaciones')) {

          Schema::create('prestamos_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('id_prestamo',9,0);
            $table->decimal('id_cotizacion',9,0);
            $table->string('nota',9,0);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('prestamos_cotizaciones');
    }
}
