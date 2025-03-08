<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_foraneo',90);
            $table->string('numero_remision',90);
            $table->string('pedido',90);
            $table->string('digitalizacion',90);
            $table->string('vendedor',90);
            $table->string('clase',90);
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
        Schema::drop('prestamos');
    }
}
