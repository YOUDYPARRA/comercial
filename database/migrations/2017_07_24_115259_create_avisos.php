<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        //
        if (!Schema::hasTable('estados')) {

        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('id_foraneo',9,0);
            $table->string('clase',90);//clase de documento y AVI de aviso
            $table->string('subclase',90);
            $table->string('organizacion',90);
            $table->string('estado',90);
            $table->string('aprobacion',90);
            $table->string('etiqueta_aprobacion',90);
            $table->string('desaprobacion',90);
            $table->string('etiqueta_desaprobacion',90);
            $table->string('condicionante',90);
            $table->string('condicion',90);
            $table->timestamps();
        });
    }
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('estados');
    }
}
