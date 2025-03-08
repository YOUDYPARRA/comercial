<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compras extends Migration
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
             $table->decimal('numero_orden',5,2)->unique();//
             $table->string('tipo_documento',50);//
             $table->string('centro_costo',10);//
             $table->string('departamento',50);//
             $table->string('fecha_entrega',20);//
             $table->string('nombre_proovedor',100);//
             $table->string('direccion_proovedor',60);//
             $table->string('colonia_proovedor',60);//
             $table->string('cp_proovedor',60);//
             $table->string('ciudad_proovedor',60);//
             $table->string('estado_proovedor',60);//
             $table->string('pais_proovedor',60);//
             $table->string('nombre_fiscal_facturacion',100);//
             $table->string('rfc_facturacion',20);//
             $table->string('direccion_facturacion',100);//
             $table->string('colonia_facturacion',60);//
             $table->string('cp_facturacion',60);//
             $table->string('delegacion_facturacion',60);//
             $table->string('ciudad_facturacion',60);//
             $table->string('nombre_agente_aduanal',60);//
             $table->string('direccion_agente',100);//
             $table->string('telefono_agente',20);//
             $table->string('fax_agente',20);//
             $table->string('correo_agente',30);//
             $table->string('numero_contrato',30);//
             $table->string('metodo_pago',32);//
             $table->string('condicion_pago_tipo',30);//
             $table->string('condicion_pago_marca',30);//
             $table->string('condicion_pago_tiempo',32);//
             $table->string('vendedor',60);//
             $table->string('nombre_cliente',60);//
             $table->string('tipo_envio',60);//
             $table->string('gerente',60);//
             $table->string('contacto_cliente',60);//
             $table->string('impuesto',20);//
             $table->string('total',30);//
             $table->string('estatus',30);//
             $table->string('fecha_pedido',20);//
             $table->string('observaciones',150);//observacion para el cliente.
             $table->string('uso',60);//
             $table->string('fecha_embarque',20);//
             $table->string('tipo_cambio',20);
             $table->string('id_camp_publ',90);//
             $table->string('org_id',90);//
             $table->string('org_name',90);//
             $table->string('c_location_id',90);//
             $table->string('id_warehouse',90);//
             $table->string('tipo_moneda',90);//
             $table->string('condicion_facturacion',90);//         
             $table->string('c_bpartner_id',90);//
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
