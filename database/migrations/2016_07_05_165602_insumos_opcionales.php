<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsumosOpcionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('insumos_opcionales', function (Blueprint $table) {
            $table->increments('id');
             $table->string('id_insumo',90);//SIN OBSERVACION
             $table->string('id_componente',90);//SIN OBSERVACION
             $table->string('id_pertenece',90);//SIN OBSERVACION
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
           Schema::drop('insumos_opcionales');
    }
}
