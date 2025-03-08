<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsumosComprasVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('insumos_compras_ventas', function (Blueprint $table) {
         $table->increments('id');
         $table->string('id_insumo',90);//
         $table->string('id_compra_venta',90);//
         $table->string('id_pack',90);//
         $table->string('tipo_equipo',90);//
         $table->string('marca',90);//
         $table->string('modelo',90);//
         $table->string('caracteristicas',150);//
         $table->string('especificaciones',150);//
         $table->string('cantidad',90);//
         $table->string('codigo_proovedor',90);//
         $table->string('descripcion',90);//
         $table->string('costos',90);//
         $table->string('precio',90);//
         $table->string('costo_moneda',90);//
         $table->string('unidad_compra',90);//
         $table->string('total',90);//
         $table->string('tipo_cambio',90);//
         $table->string('bandera_insumo',90);//
         $table->string('descuento',90);// descuento en porcetanje
         $table->string('tax_id',90);//campo alendum
         $table->string('unidad_venta',90);//campo alendum
         $table->string('check',90);//0 =elemento YA se encuentra en el sistema openbravo y se envio
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
        Schema::drop('insumos_compras_ventas');
    }
}
