<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            //            
            $table->increments('id');//
            $table->string('id_prestamo_refaccion',90);
            $table->string('id_foraneo',90);
            $table->string('id_cotizacion',90);
            $table->string('id_cliente',90);
            $table->string('id_fiscal',90);
            $table->string('folio_contrato',90);
            $table->string('folio_contrato_venta',90);
            $table->decimal('folio',9,0);
            $table->string('equipo',90);
            $table->string('marca',90);
            $table->string('modelo',90);
            $table->string('numero_serie',90);
            $table->string('imagen_serie',90);
            $table->string('nombre_responsable',90);
            $table->string('nombre_dpto_manto',90);
            $table->string('nota_cliente',90);
            $table->string('organizacion',90);
            $table->string('modificable',90);
            $table->string('estatus',90);
            $table->string('aprobado',90);
            $table->dateTime('fecha_captura',90)->nullable()->default(null);
            $table->dateTime('fecha_asignacion',90)->nullable()->default(null);
            $table->dateTime('fecha_recepcion',90)->nullable()->default(null);
            $table->string('trabajo_realizado',900);
            $table->dateTime('fecha_inicio',90)->nullable()->default(null);
            $table->dateTime('fecha_fin',90)->nullable()->default(null);
            $table->string('complejidad_servicio',90);
            $table->string('sucursal',90);
            $table->string('tipo_servicio',90);
            $table->string('condicion_servicio',90);
            $table->string('autor',90);
            $table->dateTime('fecha_atencion',90)->nullable()->default(null);
            $table->string('hora_atencion',90);
            $table->string('resuelto_por',90);
            $table->string('coordinacion',90);
            $table->string('enviar_aviso',90);
            $table->string('clase',90);
            $table->string('instituto',90);
            $table->string('vigencia',90);
            $table->string('nota',90);
            $table->string('solicitar_reporte_tecnico',90);
            $table->string('dato',90);
            $table->string('nombre_cliente',90);
            $table->string('calle',90);
            $table->string('colonia',90);
            $table->string('c_p',90);
            $table->string('ciudad',90);
            $table->string('estado',90);
            $table->string('pais',90);
            $table->string('numero',90);
            $table->string('numero_exterior',90);
            $table->string('nombre_fiscal',90);
            $table->string('calle_fiscal',90);
            $table->string('colonia_fiscal',90);
            $table->string('c_p_fiscal',90);
            $table->string('ciudad_fiscal',90);
            $table->string('estado_fiscal',90);
            $table->string('pais_fiscal',90);
            $table->string('numero_fiscal',90);
            $table->string('rfc',90);
            $table->string('c_bpartner_id',90);
            $table->string('c_bpartner_location',90);
            $table->string('celular',90);
            $table->string('telefonos',90);
            $table->string('correos',90);
            $table->string('fax',90);
            $table->string('nivel_experiencia',90);
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
        Schema::table('clases', function (Blueprint $table) {
            //
            Schema::drop('clases');
        });
    }
}
