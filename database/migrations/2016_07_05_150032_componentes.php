<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Componentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('componentes', function (Blueprint $table) {
            $table->increments('id');
             $table->string('linea',90);//rx us, mg, rm
             $table->string('componente',90);//mesa, tubo, generador, transductor, software
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
        Schema::drop('componentes');
    }
}
