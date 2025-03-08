<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Remisiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remisiones', function (Blueprint $table) {
            //
            $table->increments('id');
             $table->string('reporte',90);//
             $table->string('numero_contrato',90);//
             $table->string('numero_cotizacion',90);//
             $table->string('numero_orden_servicio',90);//
             $table->string('numero_orden_compra',90);//en su origen esta como numero_orden
             $table->string('numero_orden_venta',90);//en su origen esta como auto
             $table->string('archivo_digital',90);//
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
        Schema::table('remisiones', function (Blueprint $table) {
            //
            Schema::drop('remisiones');
        });
    }
}
