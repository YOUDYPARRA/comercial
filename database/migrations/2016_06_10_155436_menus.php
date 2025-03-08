<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
                Schema::create('menus', function (Blueprint $table) 
                {
                    $table->increments('id');                                    
                    $table->string('menu',50)->unique();//Al dar Alta ver si no se repite, al eliminar q sea Logico, no Fisico. Al consultar, solo los normales            
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
                Schema::drop('menus');
    }
}
