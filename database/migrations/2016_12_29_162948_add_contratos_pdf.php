<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContratosPdf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->string('tipo_contrato',90);//
            $table->string('representante_smh',90);//ok
            $table->string('representante_cliente',90);//ok
            $table->string('declaracion_cliente',2900);//ok
            $table->string('declaracion_smh',2900);//ok
            $table->string('definiciones',900);//ok         
            $table->string('clausula_primera',900);//ok
            $table->string('monto_total_contrato',90);//ok
            $table->string('monto_pago_inicial',90);//ok
            $table->dateTime('fecha_pago_inicial',90)->nullable()->default(null);
            $table->string('dia_final_pago',90);//ok
            $table->string('interes_moratorio_cliente',90);//ok
            $table->string('descuento_incumplimiento_smh',90);//ok
            $table->string('lugar_pago_cliente',2900);//ok
            $table->string('monto_nueva_ubicacion',90);//ok
            $table->string('rescicion_smh',1900);//ok
            $table->string('rescicion_cliente',1900);//ok
            $table->string('conclusion',900);//ok
            $table->dateTime('fecha_contrato',90)->nullable()->default(null);
            $table->string('moneda',90);//ok
            $table->string('tiempo_contrato',90);//ok
            $table->string('modalidad_pagos',90);//ok
            $table->string('tipo_cambio',90);//ok
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
         $table->dropColumn('tipo_contrato');//
         $table->dropColumn('representante_smh');//ok
         $table->dropColumn('representante_cliente');//ok
         $table->dropColumn('declaracion_cliente');//ok
         $table->dropColumn('declaracion_smh');//ok
         $table->dropColumn('definiciones');//  ok       
         $table->dropColumn('clausula_primera');//ok
         $table->dropColumn('monto_total_contrato');//ok
         $table->dropColumn('monto_pago_inicial');//ok
         $table->dropColumn('fecha_pago_inicial');//ok
         $table->dropColumn('dia_final_pago');//ok
         $table->dropColumn('interes_moratorio_cliente');//ok
         $table->dropColumn('descuento_incumplimiento_smh');//ok
         $table->dropColumn('lugar_pago_cliente');//ok
         $table->dropColumn('monto_nueva_ubicacion');//ok
         $table->dropColumn('rescicion_smh');//ok
         $table->dropColumn('rescicion_cliente');//ok
         $table->dropColumn('conclusion');//ok
         $table->dropColumn('fecha_contrato');//ok
         $table->dropColumn('moneda');//ok
         $table->dropColumn('tiempo_contrato');//ok
         $table->dropColumn('modalidad_pagos');//ok
         $table->dropColumn('tipo_cambio');//ok
        });
    }
}
