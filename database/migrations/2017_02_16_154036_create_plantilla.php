<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('plantillas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('autor');
            $table->string('clase',90);//id del servicio
            $table->string('nombre',90);
            $table->string('grupo',90);
            $table->longText('plantilla',2900);
            $table->string('observacion',90);
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
        Schema::drop('plantillas');
    }
}
