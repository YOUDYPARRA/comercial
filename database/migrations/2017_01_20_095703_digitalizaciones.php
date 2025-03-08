<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Digitalizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('digitalizaciones', function (Blueprint $table) {
        $table->increments('id');
        $table->string('clase',90);
        $table->string('subclase',90);
        $table->string('id_foraneo',90);
        $table->string('digitalizacion',90);
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
        Schema::drop('digitalizaciones');
    }
}
