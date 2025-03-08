<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdenesVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_ventas', function (Blueprint $table) {
            //
            $table->increments('id');
             $table->string('nombre_fiscal',60);//SIN OBSERVACION
             $table->string('rfc',30);//SIN OBSERVACION
             $table->string('calle_fiscal',30);//SIN OBSERVACION
             $table->string('colonia_fiscal',30);//SIN OBSERVACION
             $table->string('codigo_postal_fiscal',30);//SIN OBSERVACION
             $table->string('ciudad_fiscal',30);//SIN OBSERVACION
             $table->string('estado_fiscal',30);//SIN OBSERVACION
             $table->string('pais_fiscal',30);//SIN OBSERVACION             
             $table->string('numero_cotizacion',30);//SIN OBSERVACION
             $table->string('fecha');//SIN OBSERVACION
             $table->string('subtotal',30);//SIN OBSERVACION
             $table->string('iva',30);//SIN OBSERVACION
             $table->string('total',30);//SIN OBSERVACION             
             $table->string('nombre_empleado',90);//SIN OBSERVACION
             $table->string('contacto',30);//SIN OBSERVACION
             $table->string('correo',30);//SIN OBSERVACION
             $table->string('telefono',30);//SIN OBSERVACION
             $table->string('celular',30);//SIN OBSERVACION
             $table->string('tipo_moneda',15);//SIN OBSERVACION
             $table->string('tipo_cliente',30);//SIN OBSERVACION
             $table->string('c_bpartner_id',60);//SIN OBSERVACION
             $table->string('c_location_id',60);//SIN OBSERVACION
             $table->string('ad_user_id',30);//SIN OBSERVACION
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
             $table->string('precio',300);//CONDICION DE PRECIO...
             $table->string('condicion_pago',300);//SIN OBSERVACION
             $table->string('org_name',60);//SIN OBSERVACION
             $table->decimal('auto',5,2)->unique();//SIN OBSERVACION
             $table->string('no_contrato',60);//SIN OBSERVACION
             $table->string('archivo_digital',30);//nombre archivo
             $table->string('tipo_archivo',30)->default('orden_venta');//
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
        Schema::table('ordenes_ventas', function (Blueprint $table) {
            //
            Schema::drop('ordenes_ventas');
        });
    }
}
