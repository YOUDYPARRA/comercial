<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComprasVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_ventas', function (Blueprint $table) {
             $table->increments('id');//
             $table->string('numero_cotizacion',50);//
             $table->string('numero_contrato',30);//
             $table->string('numero_orden',30);//el numero de orden del cliente
             $table->string('tipo_archivo',50);//c= compra, v=venta
             $table->decimal('folio',5,0);//
             $table->string('autor',50);//nombre o iniciales del autor del documento.
             $table->string('area',50);//coordinacion o parecido
             $table->string('departamento',50);//departamento, ejem: servicio, c.s., licitaciones etc...
             $table->string('fecha',20);//
             $table->string('fecha_entrega',20);//campo alendum
             $table->string('fecha_embarque',20);//
             $table->string('nombre_tercero',100);//
             $table->string('direccion_tercero',60);//
             $table->string('colonia_tercero',60);//
             $table->string('cp_tercero',60);//
             $table->string('ciudad_tercero',60);//
             $table->string('estado_tercero',60);//
             $table->string('pais_tercero',60);//
             $table->string('nombre_fiscal',100);//
             $table->string('rfc',20);//
             $table->string('direccion_fiscal',100);//
             $table->string('colonia_fiscal',60);//P
             $table->string('estado_fiscal',60);//
             $table->string('codigo_postal_fiscal',60);//
             $table->string('ciudad_fiscal',60);//
             $table->string('nombre_agente_aduanal',60);//
             $table->string('direccion_agente',100);//
             $table->string('telefono_agente',20);//
             $table->string('fax_agente',20);//
             $table->string('correo_agente',30);//
             //$table->string('condicion_pago_tipo',30);//
             $table->string('condicion_pago_marca',30);//
             $table->string('condicion_pago_tiempo',32);//
             $table->string('atribuir',90);//nombre o iniciales de vendedor de este proceso
             $table->string('gerente',60);//responsable de logistica o area
             $table->string('representante_tercero',60);// o representante legal
             $table->string('correo_representante_tercero',60);// o representante legal
             $table->string('iva',30);//
             $table->string('total',30);//
             $table->string('digitalizacion',30);//
             $table->string('nota',150);//observacion para el cliente.
             $table->string('tipo_cambio',20);
             $table->string('metodo_pago',90);// campo alendum
             $table->string('tipo_envio',90);//campo alendum
             $table->string('id_camp_publ',90);//campo alendum
             $table->string('org_name',90);//campo alendum
             $table->string('id_doctype_target',90);//campo alendum
             $table->string('c_bpartner_location',90);//campo alendum DIRECCION DE ENTREGA DE LA VENTA, PUEDE VENIR DE LA COTIZACION
             $table->string('id_warehouse',90);//campo alendum
             $table->string('tipo_moneda',90);//campo alendum
             $table->string('condicion_facturacion',90);//   campo alendum
             $table->string('fecha_facturacion',90);//
             $table->string('c_bpartner_id',90);//campo alendum
             $table->string('org_id',90);//campo alendum
             $table->string('centro_costo',90);//campo alendum
             $table->string('c_order_id',90);//campo alendum
             $table->string('estatus',90);//campo alendum
             $table->string('dato',90);//campo interno
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
            Schema::drop('compras_ventas');        
    }
}
