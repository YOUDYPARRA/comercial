<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CondicionesPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condiciones_pagos', function (Blueprint $table) {
            //
        $table->increments('id');
         $table->string('id_marca',90);//
         $table->string('etiqueta',90);//
         $table->string('instituto',90);//
         $table->string('condicion',90);//   
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
        Schema::table('condiciones_pagos', function (Blueprint $table) {
            //
            Schema::drop('condiciones_pagos');
        });
    }
}
