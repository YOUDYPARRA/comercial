<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Insumos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->increments('id');
             $table->string('bandera_insumo',30);//SIN OBSERVACIONphp
             $table->string('codigo_proovedor',60);//NO REPETIBLE-NO DE SERIE-SERVICIO
             $table->string('tipo_equipo',30);//DENSITOMETRIA-U php aLTRASONIDO-RAYOS X
             $table->string('id_marca',60);//SIN OBSERVACION
             $table->string('marca',60);//SIN OBSERVACION
             $table->string('modelo',60);//SIN OBSERVACION
             $table->string('descripcion',250);//SIN OBSERVACION
             $table->string('caracteristicas',250);//SIN OBSERVACION
             $table->string('especificaciones',250);//SIN OBSERVACION
             $table->string('precio',30);//SIN OBSERVACION
             $table->string('costos',30);//SIN OBSERVACION
             $table->string('unidad_medida',30);//unidad venta.
             $table->string('tipo_cambio',30);//SIN OBSERVACION
             $table->string('estado',30);//SIN OBSERVACION
             $table->string('categoria1',30);//SIN OBSERVACION
             $table->string('categoria2',30);//SIN OBSERVACION
             $table->string('categoria3',30);//SIN OBSERVACION
             $table->string('multiprecios',30);//SIN OBSERVACION
             $table->string('unidad_compra',90);//SIN OBSERVACION
             $table->string('costo_moneda',30);//SIN OBSERVACION
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
        Schema::drop('insumos');
    }
}
