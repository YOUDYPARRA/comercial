<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
             $table->string('id_usuario',60);//SIN OBSERVACION
             $table->string('id_grupo',60);//DEPARAMENTO 
             $table->string('id_menu',60);//se guarda el id recurso para traer el id del menu y la etiqueta del recurso
             $table->string('nombre',60);//usuario
             $table->string('recurso',90);//url
             $table->string('observacion',300);//SIN OBSERVACION
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
                Schema::drop('permisos');

    }
}
