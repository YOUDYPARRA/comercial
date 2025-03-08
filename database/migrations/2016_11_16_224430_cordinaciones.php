<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cordinaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinaciones', function (Blueprint $table) {
            $table->increments('id');//
            $table->string('nombre',90);//en centro de costo
            $table->string('atributo',90);//campo de la tabla reporte de servicio
            $table->string('coordinacion',90);//equipo,producto
            $table->string('modelo',90);
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
        Schema::table('coordinaciones', function (Blueprint $table) {
            //
            Schema::drop('coordinaciones');
        });
    }
}
