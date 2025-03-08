<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
        $table->increments('id');
             $table->string('nombre_fiscal',60);//SIN OBSERVACION
             $table->string('calle_fiscal',30);//SIN OBSERVACION
             $table->string('colonia_fiscal',30);//SIN OBSERVACION
             $table->string('codigo_postal_fiscal',30);//SIN OBSERVACION
             $table->string('ciudad_fiscal',30);//SIN OBSERVACION
             $table->string('estado_fiscal',30);//SIN OBSERVACION
             $table->string('pais_fiscal',30);//SIN OBSERVACION             
             $table->string('numero_cotizacion',30);//SIN OBSERVACION
             $table->dateTime('fecha');//SIN OBSERVACION
             $table->string('subtotal',30);//SIN OBSERVACION
             $table->string('iva',30);//SIN OBSERVACION
             $table->string('total',30);//SIN OBSERVACION
             $table->string('aprobacion_ventas',30);//SIN OBSERVACION
             $table->string('fecha_aprobacion_ventas',30);//SIN OBSERVACION
             $table->string('aprobacion_marketing',30);//SIN OBSERVACION
             $table->date('fecha_aprobacion_marketing',30);//SIN OBSERVACION
             $table->string('version',10);//SIN OBSERVACION
             $table->string('nombre_empleado',90);//SIN OBSERVACION
             $table->string('estatus',30);//SIN OBSERVACION
             $table->string('contacto',30);//SIN OBSERVACION
             $table->string('correo',30);//SIN OBSERVACION
             $table->string('telefono',30);//SIN OBSERVACION
             $table->string('celular',30);//SIN OBSERVACION
             $table->string('tipo_moneda',15);//SIN OBSERVACION
             $table->string('tipo_cliente',30);//SIN OBSERVACION
             $table->string('aprobacion_cobranza',30);//SIN OBSERVACION
             $table->string('fecha_aprobacion_cobranza',15);//SIN OBSERVACION
             $table->string('c_bpartner_id',60);//SIN OBSERVACION
             $table->string('c_location_id',60);//SIN OBSERVACION
             $table->string('ad_user_id',30);//SIN OBSERVACION
             $table->string('rfc',30);//SIN OBSERVACION
             $table->string('nombre_cliente',60);//nombre comercial
             $table->string('calle_entrega',30);//SIN OBSERVACION
             $table->string('colonia_entrega',30);//SIN OBSERVACION
             $table->string('codigo_postal_entrega',30);//SIN OBSERVACION
             $table->string('ciudad_entrega',30);//SIN OBSERVACION
             $table->string('estado_entrega',30);//SIN OBSERVACION
             $table->string('pais_entrega',30);//SIN OBSERVACION
             $table->string('representante_legal',30);//SIN OBSERVACION
             $table->string('fecha_entrega',30);//SIN OBSERVACION
             $table->string('departamento',20);//SIN OBSERVACION
             $table->string('nota',300);//SIN OBSERVACION
             $table->string('usuario',300);//SIN OBSERVACION
             //$table->string('cantidad',20);//SIN OBSERVACION
             $table->string('precio',300);//CONDICION DE PRECIO...
             $table->string('tiempo_entrega',300);//CONDICION DE TIEMPO DE ENTREGA
             $table->string('condicion_pago',300);//SIN OBSERVACION
             $table->string('guia_mecanica_salvaguarda_instalacion',300);//SIN OBSERVACION
             $table->string('garantia',300);//SIN OBSERVACION
             $table->string('capacitacion',300);//SIN OBSERVACION
             $table->string('validez',300);//SIN OBSERVACION
             $table->string('anticipo',300);//SIN OBSERVACION
             $table->string('reporte',60);//SIN OBSERVACION
             $table->string('org_name',60);//SIN OBSERVACION
             $table->string('auto',60);//SIN OBSERVACION
             $table->string('no_reporte',60);//SIN OBSERVACION
             $table->string('no_contrato',60);//SIN OBSERVACION
             $table->string('no_orden_servicio',60);//SIN OBSERVACION
             $table->string('mensaje_atencion',1000);//SIN OBSERVACION
             $table->string('aprobacion_servicio',90);//SIN OBSERVACION
             $table->string('fecha_aprobacion_servicio',90);//SIN OBSERVACION
             $table->string('cotizacion_digital',30);//0/1
             $table->string('centro_costo',70);//0/1
             $table->string('no_pedido',70);//0/1
             $table->string('area',70);//0/1
             $table->string('metodo_pago',70);//0/1
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
        Schema::drop('cotizaciones');
    }
}
