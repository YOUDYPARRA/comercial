<?php

use Illuminate\Database\Seeder;

class CUReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $data[
        	'id_prestamo_refaccion'=>'',
            'id_foraneo'=>'',
            'id_cotizacion'=>'',
            'id_cliente'=>'',
            'id_fiscal'=>'',
            'folio_contrato'=>'',
            'folio_contrato_venta'=>'',
            'folio'=>'1',
            'equipo'=>'ULTRASONIDO',
            'marca'=>'HITACHI',
            'modelo'=>'ALPHA 6',
            'numero_serie'=>'',
            'nombre_responsable'=>'',
            'nombre_dpto_manto'=>'',
            'nota_cliente'=>'',
            'organizacion'=>'SMH',
            'modificable'=>'N',
            'estatus'=>'ESPERA',
            'aprobado'=>'',
            'fecha_captura'=>'02-12-2016',
            'fecha_asignacion'=>'',
            'fecha_recepcion'=>'',
            'trabajo_realizado'=>'',
            'fecha_inicio'=>'11-12-2016',
            'fecha_fin'=>'',
            'complejidad_servicio'=>'',
            'sucursal'=>'MX',
            'tipo_servicio'=>'',
            'condicion_servicio'=>'',
            'autor'=>'',
            'fecha_atencion'=>'',
            'hora_atencion'=>'',
            'resuelto_por'=>'',
            'coordinacion'=>'OPERACIONES MTY',
            'enviar_aviso'=>'',
            'clase'=>'',
            'instituto'=>'',
            'vigencia'=>'01-01-2017',
            'nota'=>'',
            'solicitar_reporte_tecnico'=>'',
            'dato'=>'',
            'nombre_cliente'=>'HOSPITAL THE AMERICAN BRITISH CODWAY',
            'calle'=>'CALLE',
            'colonia'=>'COLONIA',
            'c_p'=>'C.P',
            'ciudad'=>'CIUDAD',
            'estado'=>'ESTADO',
            'pais'=>'PAIS',
            'numero'=>'9',
            'numero_exterior'=>'',
            'nombre_fiscal'=>'HOSPITAL THE AMERICAN BRITISH CODWAY',
            'calle_fiscal'=>'CF',
            'colonia_fiscal'=>'CF',
            'c_p_fiscal'=>'CPF',
            'ciudad_fiscal'=>'CF',
            'estado_fiscal'=>'EF',
            'pais_fiscal'=>'PF',
            'numero_fiscal'=>'NF',
            'rfc'=>'RFC',
            'c_bpartner_id'=>'',
            'c_bpartner_location'=>'',
            'telefonos'=>'0000000	',
            'celular'=>'',
            'correos'=>'correo@correo.com.mx',
            'fax'=>'',
            'id_cliente'=>'',
            'id_fiscal=>'''

        ];
        \DB::table('clases')->insert(
                    $menus
                    );   
    }
}
