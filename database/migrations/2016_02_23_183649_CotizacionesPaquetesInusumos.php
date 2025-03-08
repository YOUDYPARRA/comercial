<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CotizacionesPaquetesInusumos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_paquetes_insumos', function (Blueprint $table) {
            $table->increments('id');
           $table->string('id_cotizacion',60);//SIN OBSERVACION
            //$table->string('id_paquete',60);//SIN OBSERVACION
            $table->string('id_insumo',60);//SIN OBSERVACION
            $table->string('bandera_insumo',30);//SIN OBSERVACION
            $table->string('codigo_proovedor',60);//NO REPETIBLE-NO DE SERIE-SERVICIO
           $table->string('tipo_equipo',30);//DENSITOMETRIA-ULTRASONIDO-RAYOS X
            $table->string('marca',60);//SIN OBSERVACION
            $table->string('modelo',60);//SIN OBSERVACION
            $table->string('descripcion',250);//SIN OBSERVACION
            $table->string('caracteristicas',250);//SIN OBSERVACION
            $table->string('especificaciones',250);//SIN OBSERVACION
            $table->string('precio',30);//SIN OBSERVACION
            $table->string('costos',30);//SIN OBSERVACION
            $table->string('unidad_medida',30);//SIN OBSERVACION
            $table->string('tipo_cambio',30);//SIN OBSERVACION
            $table->string('estado',30);//SIN OBSERVACION  
            $table->string('cantidad_unidad_compra',30);//SIN OBSERVACION  
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
        //
        Schema::drop('cotizaciones_paquetes_insumos');
    }
}
