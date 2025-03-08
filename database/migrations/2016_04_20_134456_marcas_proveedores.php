<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarcasProveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('marcas_proveedores', function (Blueprint $table) {
                                    $table->increments('id');
                                     $table->string('nombre_proveedor',100);//SIN OBSERVACION
                                     $table->string('marca_representada',60);//SIN OBSERVACION
                                     $table->string('dias_entrega_maximo',20);//SIN OBSERVACION
                                     $table->string('dias_entrega_minimo',20);//SIN OBSERVACION
                                     $table->string('observacion',250);//SIN OBSERVACION     
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
        Schema::drop('marcas_proveedores');

    }
}
