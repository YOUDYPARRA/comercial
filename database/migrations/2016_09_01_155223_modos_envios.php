<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModosEnvios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modos_envios', function (Blueprint $table) {
            //
            $table->increments('id');
             $table->string('tipo_envio',90)->unique();
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
    {            //
            Schema::drop('modos_envios');
        
    }
}
