<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionesClase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('configuraciones_clase')) {

        Schema::create('configuraciones_clase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_foraneo',90);//
            $table->string('condicionante',90);//
            $table->string('condicion',90);//
            $table->string('objeto',90);//
            $table->string('subobjeto',90);//
            $table->string('clase',90);//
            $table->string('clasificacion',90);//
            $table->string('organizacion',90);//
            $table->string('subclase',90);//
            $table->timestamps();
                    });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('configuraciones_clase');
    }
}
