<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_foraneo',90);
            $table->string('clase',90);//CCT para cotizacion contrato servicio
            $table->string('subclase',90);
            $table->json('json',2900);
            $table->longText('texto',30000);
            $table->string('version',90);
            $table->string('subtotal',90);
            $table->string('iva',90);
            $table->string('total',90);
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
        Schema::drop('documentos');
    }
}
