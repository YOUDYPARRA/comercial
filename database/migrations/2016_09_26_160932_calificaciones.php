<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            //
            $table->increments('id');//
             $table->string('id_producto',90);//
             $table->string('nombre_tipo');//nombre del documento
             $table->string('ruta_siguiente');//
             $table->string('ruta_califico');//para efectos de historial
             $table->string('calificacion');//
             $table->string('iniciales');//
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
        Schema::table('calificaciones', function (Blueprint $table) {
            //
            Schema::drop('calificaciones');
        });
    }
}
