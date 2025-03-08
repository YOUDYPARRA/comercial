<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pagares', function (Blueprint $table) {
                                    $table->increments('id');
                                     $table->string('id_cotizacion',300);//SIN OBSERVACION
                                     $table->string('id_contrato_compra_venta',300);//SIN OBSERVACION
                                     $table->string('lugar_suscripcion',300);//SIN OBSERVACION
                                     $table->string('fecha_suscripcion',20);//SIN OBSERVACION
                                     $table->string('obligacion_suscriptor',300);//LEYENDA DE PAGARE PREDISEÑADA
                                     $table->string('financiamiento',10);//VALOR TOTAL DEL PAGARE CON NUMERO Y LETRA
                                     $table->string('forma_pago',10);//forma pago o mensualidades y monto de mensuales con numero y letras
                                     $table->string('mensualidad',10);//SIN OBSERVACION
                                     $table->string('falta_pago',300);//LEYENDA DE PAGARE PREDISEÑADA
                                     $table->string('porcentaje',30);//SIN OBSERVACION
                                     $table->string('controversia_suscripcion',300);//LEYENDA DE PAGARE PREDISEÑADA
                                     $table->string('aval',90);//SIN OBSERVACION            
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
        Schema::drop('pagares');
    }
}
