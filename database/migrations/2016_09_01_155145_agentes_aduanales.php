<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgentesAduanales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentes_aduanales', function (Blueprint $table) {
        $table->increments('id');
         $table->string('agente_aduanal',90)->unique();//
         $table->string('telefono',90);//
         $table->string('ubicacion',150);//
         $table->string('fax',90);//
         $table->string('email',90);
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
        Schema::table('agentes_aduanales', function (Blueprint $table) {
            //
            Schema::drop('agentes_aduanales');
        });
    }
}
