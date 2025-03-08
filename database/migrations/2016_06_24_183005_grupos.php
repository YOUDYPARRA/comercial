<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('grupos', function (Blueprint $table) 
        {
            
                    $table->increments('id');                                    
                    $table->string('grupo',50);
                    $table->string('observacion',500);
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
        //
        Schema::drop('grupos');
    }
}
