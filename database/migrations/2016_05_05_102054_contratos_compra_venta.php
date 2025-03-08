<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContratosCompraVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contratos_compra_venta', function (Blueprint $table) {
            $table->increments('id');
             $table->string('id_cotizacion',90);//SIN OBSERVACION
             $table->string('numero_contrato_compra_venta',90);//SIN OBSERVACION
             $table->string('leyenda_comprador',600);//SIN OBSERVACION
             $table->string('identificacion',10);//OPCIONAL
             $table->string('numero',20);//OPCIONAL
             $table->string('numero_escritura_publica',30);//OPCIONAL
             $table->string('numero_poder',30);//OPCIONAL
             $table->string('notario',10);//OPCIONAL
             $table->string('ciudad',20);//OPCIONAL
             $table->string('aclaracion_dato_comprador',600);//SIN OBSERVACION
             $table->string('leyenda_equipo',600);//SIN OBSERVACION
             $table->string('acuerdo_equipo',600);//SIN OBSERVACION
             $table->string('fecha',20);//SIN OBSERVACION
             $table->string('mensualidad',20);//SIN OBSERVACION
             $table->string('condicion_pago',600);//SIN OBSERVACION
             $table->string('enganche',30);//en base al  enganche sacar el % en enganche
             $table->string('financiamiento',100);
             $table->string('forma_pago',100);//SIN OBSERVACION
             $table->string('aclaracion_pago',600);//SIN OBSERVACION
             $table->string('obligacion_comprador',6000);//SIN OBSERVACION
             $table->string('condicion_entrega',600);//SIN OBSERVACION
             $table->string('condicion_adecuacion',600);//SIN OBSERVACION
             $table->string('condicion_clausula',600);//SIN OBSERVACION
             $table->string('aval',100);//SIN OBSERVACION
             $table->string('comprador_representante',100);//SIN OBSERVACION            
             $table->timestamps();
             $table->softDeletes();

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
        Schema::drop('contratos_compra_venta');
    }
}
