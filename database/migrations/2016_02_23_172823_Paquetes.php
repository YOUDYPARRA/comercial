<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paquetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('paquetes', function (Blueprint $table) {
            $table->increments('id');
             $table->string('id_equipo',60);//SIN OBSERVACION
             $table->string('id_refaccion',60);//SIN OBSERVACION
             $table->string('id_pack',60);//SIN OBSERVACION
             $table->string('codigo_proovedor',30);//SIN OBSERVACION 
             $table->string('bandera_insumo',30);//SIN OBSERVACION 
             $table->string('nombre_paquete',30);//SIN OBSERVACION 
             $table->string('tipo_equipo',30);//SIN OBSERVACION 
             $table->string('marca',30);//SIN OBSERVACION 
             $table->string('modelo',30);//SIN OBSERVACION 
             $table->string('descripcion',30);//SIN OBSERVACION 
             $table->string('caracteristica',30);//SIN OBSERVACION 
             $table->string('especificacion',30);//SIN OBSERVACION 
             $table->string('precio',30);//SIN OBSERVACION 
             $table->string('costo',30);//SIN OBSERVACION 
             $table->string('tipo_cambio',30);//SIN OBSERVACION 
             $table->string('estado',30);//SIN OBSERVACION 
             $table->string('usuario',30);//SIN OBSERVACION 
             $table->string('cantidad',30);//SIN OBSERVACION 
            
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
        Schema::drop('paquetes');
    }
}
