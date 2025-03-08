<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comercial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comerciales', function (Blueprint $table) {
            $table->increments('id');//
            $table->string('nombre_cliente')->unique();
            $table->string('calle');
            $table->string('colonia');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('c_p');
            $table->string('pais');
            $table->string('numero');
            $table->string('numero_exterior');
            $table->string('rfc');//01
            $table->string('fiscal');//01
            $table->string('c_bpartner_id');
            $table->string('c_bpartner_location');
            $table->string('instituto');
            $table->string('telefono');
            $table->string('correos');
            $table->string('fax');
            $table->string('nacional');//YN
            $table->string('local');//1,0
            $table->string('celular');
            $table->string('dato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comerciales', function (Blueprint $table) {
            //
            Schema::drop('comerciales');
        });
    }
}
