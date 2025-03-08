<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatalogoCalculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('catalogos_calculo', function (Blueprint $table) {
        $table->increments('id');
         $table->string('modelo',100);//SIN OBSERVACION
         $table->string('flete',30);//SIN OBSERVACION
         $table->string('fraccion_arancelaria',30);//SIN OBSERVACION
         $table->string('igi_ige',30);//SIN OBSERVACION
         $table->string('dta',30);//SIN OBSERVACION
         $table->string('h_agente_aduanal',10);//SIN OBSERVACION
         $table->string('porcentaje_impuesto_importacion',10);//SIN OBSERVACION
         $table->string('iva',30);//SIN OBSERVACION
         $table->string('costo_hora',30);//SIN OBSERVACION
         $table->string('tiempo_instalacion_total',10);//SIN OBSERVACION
         $table->string('tiempo_viaje_instalacion',10);//SIN OBSERVACION
         $table->string('costo_visita_proyectos',30);//SIN OBSERVACION
         $table->string('costo_instalacion',30);//SIN OBSERVACION
         $table->string('costo_parte',30);//SIN OBSERVACION
         $table->string('gasto_importacion_partes',30);//SIN OBSERVACION
         $table->string('mano_obra_garantia_hrs',10);//SIN OBSERVACION
         $table->string('mano_obra_garantia_usd',30);//SIN OBSERVACION
         $table->string('impuesto_importacion_refacciones',30);//SIN OBSERVACION
         $table->string('costos_garantia',30);//SIN OBSERVACION
         $table->string('total_costo_instalacion_garantia',30);//SIN OBSERVACION
         $table->string('tiempo_preventivo',10);//SIN OBSERVACION
         $table->string('preventivo_anual',10);//SIN OBSERVACION
         $table->string('ingeniero_instalacion',10);//SIN OBSERVACION
         $table->string('tiempo_instalacion',10);//SIN OBSERVACION
         $table->string('usuario',10);//SIN OBSERVACION            
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
        Schema::drop('catalogos_calculo');
    }
}
