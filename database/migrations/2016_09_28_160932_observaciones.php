<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class observaciones extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            //
            $table->increments('id');//
             $table->string('nombre_tipo',90);//
             $table->string('id_producto',90);//nombre del documento
             $table->string('observacion',1000);//
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
            Schema::drop('observaciones');
        
    }
}
