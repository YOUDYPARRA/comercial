<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Precalculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('precalculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_catalogo',30);//SIN OBSERVACION
            $table->string('id_cotizaciones_paquetes_insumos',30);//SIN OBSERVACION
            $table->string('fecha_catalogo',20);//SIN OBSERVACION
            $table->string('moneda',10);//SIN OBSERVACION
            $table->string('fecha_tipo_cambio',15);//SIN OBSERVACION
            $table->string('tipo_cambio',30);//SIN OBSERVACION
            $table->string('precio_dolares',30);//SIN OBSERVACION
            $table->string('descuento',30);//SIN OBSERVACION
            $table->string('precio_dolares_descuento',30);//SIN OBSERVACION
            $table->string('impuesto_importacion',30);//SIN OBSERVACION
            $table->string('porcentaje_impuesto_importacion',10);//SIN OBSERVACION
            $table->string('agente_aduanal',30);//SIN OBSERVACION
            $table->string('h_agente_aduanal',10);//SIN OBSERVACION
            $table->string('flete',30);//SIN OBSERVACION
            $table->string('porcentaje_flete',10);//SIN OBSERVACION
            $table->string('costo_instalacion',30);//SIN OBSERVACION
            $table->string('porcentaje_costo_instalacion',10);//SIN OBSERVACION
            $table->string('preparacion_sitio',30);//SIN OBSERVACION
            $table->string('porcentaje_preparacion_sitio',10);//SIN OBSERVACION
            $table->string('modelo_insumos',50);//SIN OBSERVACION
            $table->string('precio_compra_insumos',30);//SIN OBSERVACION
            $table->string('porcentaje_insumos',10);//SIN OBSERVACION
            $table->string('subtotal_1',30);//SIN OBSERVACION
            $table->string('porcentaje_subtotal_1',30);//SIN OBSERVACION
            $table->string('margen_bruto',30);//SIN OBSERVACION
            $table->string('porcentaje_margen_bruto',10);//SIN OBSERVACION
            $table->string('total_costo_instalacion_garantia',30);//SIN OBSERVACION
            $table->string('porcentaje_garantia',10);//SIN OBSERVACION
            $table->string('reserva_refaccion',30);//SIN OBSERVACION
            $table->string('porcentaje_reserva_refaccion',10);//SIN OBSERVACION
            $table->string('garantia_adicional',30);//SIN OBSERVACION
            $table->string('porcentaje_garantia_adicional',10);//SIN OBSERVACION
            $table->string('patrocinio_congreso_publicacion',30);//SIN OBSERVACION
            $table->string('porcentaje_patrocinio_congreso_publicacion',10);//SIN OBSERVACION
            $table->string('cargo_bancario',10);//SIN OBSERVACION
            $table->string('porcentaje_cargo_bancario',10);//SIN OBSERVACION
            $table->string('subtotal_2',30);//SIN OBSERVACION
            $table->string('porcentaje_subtotal_2',10);//SIN OBSERVACION
            $table->string('financiera',30);//SIN OBSERVACION
            $table->string('porcentaje_financiera',10);//SIN OBSERVACION
            $table->string('distribuidor',30);//SIN OBSERVACION
            $table->string('porcentaje_distribuidor',10);//SIN OBSERVACION
            $table->string('otros',30);//SIN OBSERVACION
            $table->string('porcentaje_otros',10);//SIN OBSERVACION
            $table->string('subtotal_3',30);//SIN OBSERVACION
            $table->string('porcentaje_subtotal_3',10);//SIN OBSERVACION
            $table->string('capacitacion',30);//SIN OBSERVACION
            $table->string('porcentaje_capacitacion',10);//SIN OBSERVACION
            $table->string('comision',30);//SIN OBSERVACION
            $table->string('porcentaje_comision',10);//SIN OBSERVACION
            $table->string('margen_negocio',10);//SIN OBSERVACION
            $table->string('porcentaje_margen_negocio',10);//SIN OBSERVACION
            $table->string('precio_venta',50);//SIN OBSERVACION
            $table->string('observaciones',900);//SIN OBSERVACION
            $table->string('numero_proyecto',10);//SIN OBSERVACION
            $table->string('venta_total_t_i',50);//SIN OBSERVACION
            $table->string('valor_venta_e_i',30);//SIN OBSERVACION
            $table->string('valor_venta_servicio_e_p',10);//SIN OBSERVACION
            $table->string('valor_venta_servicio_e_i',30);//SIN OBSERVACION
            $table->string('valor_venta_servicio_s_p',10);//SIN OBSERVACION
            $table->string('valor_venta_servicio_s_i',30);//SIN OBSERVACION
            $table->string('valor_venta_servicio_t_p',10);//SIN OBSERVACION
            $table->string('valor_venta_servicio_t_i',30);//SIN OBSERVACION
            $table->string('costo_venta_producto_e_p',10);//SIN  OBSERVACION
            $table->string('costo_venta_producto_e_i',30);//SIN OBSERVACION
            $table->string('costo_venta_producto_s_p',10);//SIN OBSERVACION
            $table->string('costo_venta_producto_s_i',30);//SIN OBSERVACION
            $table->string('costo_venta_producto_t_p',10);//SIN OBSERVACION
            $table->string('costo_venta_producto_t_i',30);//SIN OBSERVACION
            $table->string('costo_venta_terceros_e_p',10);//SIN OBSERVACION
            $table->string('costo_venta_terceros_e_i',30);//SIN OBSERVACION
            $table->string('costo_venta_terceros_s_p',10);//SIN OBSERVACION
            $table->string('costo_venta_terceros_s_i',30);//SIN OBSERVACION
            $table->string('costo_venta_terceros_t_p',10);//SIN OBSERVACION
            $table->string('costo_venta_terceros_t_i',30);//SIN OBSERVACION
            $table->string('remplazo_parte_servicio_e_p',10);//SIN OBSERVACION
            $table->string('remplazo_parte_servicio_e_i',30);//SIN OBSERVACION
            $table->string('remplazo_parte_servicio_s_p',10);//SIN OBSERVACION
            $table->string('remplazo_parte_servicio_s_i',30);//SIN OBSERVACION
            $table->string('remplazo_parte_servicio_t_p',10);//SIN OBSERVACION
            $table->string('remplazo_parte_servicio_t_i',30);//SIN OBSERVACION
            $table->string('costo_material_e_p',10);//SIN OBSERVACION
            $table->string('costo_material_e_i',30);//SIN OBSERVACION
            $table->string('costo_material_s_p',10);//SIN OBSERVACION
            $table->string('costo_material_s_i',30);//SIN OBSERVACION
            $table->string('costo_material_t_p',10);//SIN OBSERVACION
            $table->string('costo_material_t_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_e_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_e_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_s_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_s_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_t_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_t_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_agente_e_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_agente_e_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_agente_s_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_agente_s_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_agente_t_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_agente_t_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_tercero_e_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_tercero_e_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_tercero_s_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_tercero_s_i',30);//SIN OBSERVACION
            $table->string('preparacion_sitio_tercero_t_p',10);//SIN OBSERVACION
            $table->string('preparacion_sitio_tercero_t_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_e_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_e_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_s_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_s_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_t_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_t_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_agente_e_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_agente_e_i',30);//sin observacion
            $table->string('costo_instalacionl_agente_s_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_agente_s_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_agente_t_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_agente_t_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_terceros_e_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_terceros_e_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_terceros_s_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_terceros_s_i',30);//SIN OBSERVACION
            $table->string('costo_instalacion_terceros_t_p',10);//SIN OBSERVACION
            $table->string('costo_instalacion_terceros_t_i',30);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_interna_e_p',10);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_interna_e_i',30);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_interna_s_p',10);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_interna_s_i',30);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_interna_t_p',10);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_interna_t_i',30);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_terceros_e_p',10);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_terceros_e_i',30);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_terceros_s_p',10);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_terceros_s_i',30);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_terceros_t_p',10);//SIN OBSERVACION
            $table->string('mano_obra_subcontr_terceros_t_i',30);//SIN OBSERVACION
            $table->string('capacitacion_cliente_e_p',10);//SIN OBSERVACION
            $table->string('capacitacion_cliente_e_i',30);//SIN OBSERVACION
            $table->string('capacitacion_cliente_s_p',10);//SIN OBSERVACION
            $table->string('capacitacion_cliente_s_i',30);//SIN OBSERVACION
            $table->string('capacitacion_cliente_t_p',10);//SIN OBSERVACION
            $table->string('capacitacion_cliente_t_i',30);//SIN OBSERVACION
            $table->string('costo_venta_e_p',10);//SIN OBSERVACION
            $table->string('costo_venta_e_i',30);//SIN OBSERVACION
            $table->string('costo_venta_s_p',10);//SIN OBSERVACION
            $table->string('costo_venta_s_i',30);//SIN OBSERVACION
            $table->string('costo_venta_t_p',10);//SIN OBSERVACION
            $table->string('costo_venta_t_i',30);//SIN OBSERVACION
            $table->string('margen_bruto_e_p',10);//SIN OBSERVACION
            $table->string('margen_bruto_e_i',30);//SIN OBSERVACION
            $table->string('margen_bruto_s_p',10);//SIN OBSERVACION
            $table->string('margen_bruto_s_i',30);//SIN OBSERVACION
            $table->string('margen_bruto_t_p',10);//SIN OBSERVACION
            $table->string('margen_bruto_t_i',30);//SIN OBSERVACION
            $table->string('garantia_parte_e_p',10);//SIN OBSERVACION
            $table->string('garantia_parte_e_i',30);//SIN OBSERVACION
            $table->string('garantia_parte_s_p',10);//SIN OBSERVACION
            $table->string('garantia_parte_s_i',30);//SIN OBSERVACION
            $table->string('garantia_parte_t_p',10);//SIN OBSERVACION
            $table->string('garantia_parte_t_i',30);//SIN OBSERVACION
            $table->string('garantia_mano_obra_e_p',10);//SIN OBSERVACION
            $table->string('garantia_mano_obra_e_i',30);//SIN OBSERVACION
            $table->string('garantia_mano_obra_s_p',10);//SIN OBSERVACION
            $table->string('garantia_mano_obra_s_i',30);//SIN OBSERVACION
            $table->string('garantia_mano_obra_t_p',10);//SIN OBSERVACION
            $table->string('garantia_mano_obra_t_i',30);//SIN OBSERVACION
            $table->string('comision_pagar_tercero_e_p',10);//SIN OBSERVACION
            $table->string('comision_pagar_tercero_e_i',30);//SIN OBSERVACION
            $table->string('comision_pagar_tercero_s_p',10);//SIN OBSERVACION
            $table->string('comision_pagar_tercero_s_i',30);//SIN OBSERVACION
            $table->string('comision_pagar_tercero_t_p',10);//SIN OBSERVACION
            $table->string('comision_pagar_tercero_t_i',30);//SIN OBSERVACION
            $table->string('comision_agente_venta_e_p',10);//SIN OBSERVACION
            $table->string('comision_agente_venta_e_i',30);//SIN  OBSERVACION
            $table->string('comision_agente_venta_s_p',10);//SIN OBSERVACION
            $table->string('comision_agente_venta_s_i',30);//SIN OBSERVACION
            $table->string('comision_agente_venta_t_p',10);//SIN OBSERVACION
            $table->string('comision_agente_venta_t_i',30);//SIN OBSERVACION
            $table->string('servicio_externo_e_p',10);//SIN OBSERVACION
            $table->string('servicio_externo_e_i',30);//SIN OBSERVACION
            $table->string('servicio_externo_s_p',10);//SIN OBSERVACION
            $table->string('servicio_externo_s_i',30);//SIN OBSERVACION
            $table->string('servicio_externo_t_p',10);//SIN OBSERVACION
            $table->string('servicio_externo_t_i',30);//SIN OBSERVACION
            $table->string('capacitacion_personal_e_p',10);//SIN OBSERVACION
            $table->string('capacitacion_personal_e_i',30);//SIN OBSERVACION
            $table->string('capacitacion_personal_s_p',10);//SIN OBSERVACION
            $table->string('capacitacion_personal_s_i',30);//SIN OBSERVACION
            $table->string('capacitacion_personal_t_p',10);//SIN OBSERVACION
            $table->string('capacitacion_personal_t_i',30);//SIN OBSERVACION
            $table->string('publicidad_patrocinio_congreso_e_p',10);//SIN OBSERVACION
            $table->string('publicidad_patrocinio_congreso_e_i',30);//SIN OBSERVACION
            $table->string('publicidad_patrocinio_congreso_s_p',10);//SIN OBSERVACION
            $table->string('publicidad_patrocinio_congreso_s_i',30);//SIN OBSERVACION
            $table->string('publicidad_patrocinio_congreso_t_p',10);//SIN OBSERVACION
            $table->string('publicidad_patrocinio_congreso_t_i',30);//SIN OBSERVACIONES
            $table->string('cargo_bancario_e_p',10);//SIN OBSERVACION
            $table->string('cargo_bancario_e_i',30);//SIN OBSERVACION
            $table->string('cargo_bancario_s_p',10);//SIN OBSERVACION
            $table->string('cargo_bancario_s_i',30);//SIN OBSERVACION
            $table->string('cargo_bancario_t_p',10);//SIN OBSERVACION
            $table->string('cargo_bancario_t_i',30);//SIN OBSERVACION
            $table->string('costo_financiero_e_p',10);//SIN OBSERVACION
            $table->string('costo_financiero_e_i',30);//SIN OBSERVACION
            $table->string('costo_financiero_s_p',10);//SIN OBSERVACION
            $table->string('costo_financiero_s_i',30);//SIN OBSERVACION
            $table->string('costo_financiero_t_p',10);//SIN OBSERVACION
            $table->string('costo_financiero_t_i',30);//SIN OBSERVACION
            $table->string('gasto_viaje_cliente_e_p',10);//SIN OBSERVACION
            $table->string('gasto_viaje_cliente_e_i',30);//SIN OBSERVACION
            $table->string('gasto_viaje_cliente_s_p',10);//SIN OBSERVACION
            $table->string('gasto_viaje_cliente_s_i',30);//SIN OBSERVACION
            $table->string('gasto_viaje_cliente_t_p',10);//SIN OBSERVACION
            $table->string('gasto_viaje_cliente_t_i',30);//SIN OBSERVACION
            $table->string('gasto_viaje_personal_smh_e_p',10);//SIN OBSERVACION
            $table->string('gasto_viaje_personal_smh_e_i',30);//SIN OBSERVACION
            $table->string('gasto_viaje_personal_smh_s_p',10);//SIN OBSERVACION
            $table->string('gasto_viaje_personal_smh_s_i',30);//SIN OBSERVACION
            $table->string('gasto_viaje_personal_smh_t_p',10);//SIN OBSERVACION
            $table->string('gasto_viaje_personal_smh_t_i',30);//SIN OBSERVACION
            $table->string('impuesto_aduanal_e_p',10);//SIN OBSERVACION
            $table->string('impuesto_aduanal_e_i',30);//SIN OBSERVACION
            $table->string('impuesto_aduanal_s_p',10);//SIN OBSERVACION
            $table->string('impuesto_aduanal_s_i',30);//SIN OBSERVACION
            $table->string('impuesto_aduanal_t_p',10);//SIN OBSERVACION
            $table->string('impuesto_aduanal_t_i',30);//SIN OBSERVACION
            $table->string('flete_e_p',10);//SIN OBSERVACION
            $table->string('flete_e_i',30);//SIN OBSERVACION
            $table->string('flete_s_p',10);//SIN OBSERVACION
            $table->string('flete_s_i',30);//SIN OBSERVACION
            $table->string('flete_t_p',10);//SIN OBSERVACION
            $table->string('flete_t_i',30);//SIN OBSERVACION
            $table->string('seguro_e_p',10);//SIN OBSERVACION
            $table->string('seguro_e_i',30);//SIN OBSERVACION
            $table->string('seguro_s_p',10);//SIN OBSERVACION
            $table->string('seguro_s_i',30);//SIN OBSERVACION
            $table->string('seguro_t_p',10);//SIN OBSERVACION
            $table->string('seguro_t_i',30);//SIN OBSERVACION
            $table->string('costo_proyecto_e_p',10);//SIN OBSERVACION
            $table->string('costo_proyecto_e_i',30);//SIN OBSERVACION
            $table->string('costo_proyecto_s_p',10);//SIN OBSERVACION
            $table->string('costo_proyecto_s_i',30);//SIN OBSERVACION
            $table->string('costo_proyecto_t_p',10);//SIN OBSERVACION
            $table->string('costo_proyecto_t_i',30);//SIN OBSERVACION
            $table->string('gasto_venta_dedicado_e_p',10);//SIN OBSERVACION
            $table->string('gasto_venta_dedicado_e_i',30);//SIN OBSERVACION
            $table->string('gasto_venta_dedicado_s_p',10);//SIN OBSERVACION
            $table->string('gasto_venta_dedicado_s_i',30);//SIN OBSERVACION
            $table->string('gasto_venta_dedicado_t_p',10);//SIN OBSERVACION
            $table->string('gasto_venta_dedicado_t_i',30);//SIN OBSERVACION 
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
        Schema::drop('precalculos');
    }
}
