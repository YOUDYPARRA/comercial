<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Precios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');
             $table->string('id_insumo',90);
             $table->string('etiqueta',60);
             $table->string('monto',30);
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
        Schema::drop('precios');    
    }
}
