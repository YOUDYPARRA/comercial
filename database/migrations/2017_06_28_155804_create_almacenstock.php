<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmacenstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('almacenes_stock')) {
        //
        Schema::create('almacenes_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_insumo',90);
            $table->string('codigo_proovedor',90);
            $table->string('m_product_id',90);
            $table->string('calcular',90);
            $table->string('org_name',90);
            $table->string('aviso',90);
            $table->string('tiempo_respuesta',90);
            $table->string('porcentaje_seguridad',90);
            $table->string('almacen',90);
            $table->string('id_warehouse',90);
            $table->string('punto_pedido',90);
            $table->string('maximo',90);
            $table->string('clase',90);
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
        Schema::table('almacenes_stock', function (Blueprint $table) {
            //
            Schema::drop('almacenes_stock');
        });
    }
}
