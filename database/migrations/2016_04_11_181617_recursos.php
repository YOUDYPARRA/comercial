<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('recursos', function (Blueprint $table) {
            $table->increments('id');
             $table->string('recurso',90)->unique();//URL DEL RECURSO...
             $table->string('id_menu',60);//ID nombre del menu...
             $table->string('etiqueta',60);//Etiqueta a mostrar para su uso
             $table->string('observacion',360);//SIN OBSERVACION
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
                        Schema::drop('recursos');

    }
}
