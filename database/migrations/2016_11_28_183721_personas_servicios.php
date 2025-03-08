<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonasServicios extends Migration
{
    /**
     * Run the migrations.
     *id
id_prestamo_refaccion
id_cotizacion
folio_contrato
folio//folio reporte

equipo
marca
modelo
numero_serie

nombre_responsable



organizacion



c_bpartner_id
c_bpartner_location



aprobado




fecha_inicio
fecha_fin
hora_atencion

complejidad_servicio
sucursal


tipo_servicio
condicion_servicio
folio_contrato_venta

autor



coordinacion
enviar_aviso
clase
instituto
vigencia
solicitar_reporte_tecnico
dato
nombre_cliente
calle
colonia
c_p
ciudad
estado
pais
numero
numero_exterior
c_bpartner_id
c_bpartner_location
nombre_fiscal
calle_fiscal
colonia_fiscal
c_p_fiscal
ciudad_fiscal
estado_fiscal
pais_fiscal
numero_fiscal
rfc
telefonos
correos
fax
id_cliente
id_fiscal

     * @return void
     */
    public function up()
    {
        Schema::create('personas_servicios', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('id_user');
            $table->string('iniciales');
            $table->string('email');
            $table->string('name');
            $table->string('vigente');
            $table->string('asistencia');//oficina o sitio
            $table->string('clase');//P:porgrado,A:asignado,S:sugerencia
            $table->string('id_clase');//id orden servicio o id_reporte o id_programa
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
        Schema::table('personas_servicios', function (Blueprint $table) {
            //
            Schema::drop('personas_servicios');
        });
    }
}
