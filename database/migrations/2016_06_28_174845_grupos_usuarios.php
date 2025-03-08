<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GruposUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('grupos_usuarios', function (Blueprint $table) 
        {
            
                    $table->increments('id');                                    
                    $table->string('id_grupo',50);
                    $table->string('id_usuario',50);
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
        Schema::drop('grupos_usuarios');
    }
}
