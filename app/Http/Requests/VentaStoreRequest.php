<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VentaStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'autor'=>'required',
        'area'=>'required',
        'numero_cotizacion'=>'required',
        'departamento'=>'required',
        'fecha_entrega'=>'required',
        'fecha'=>'required',
        //'fecha_embarque'=>'required',
        'nombre_tercero'=>'required',
        'direccion_tercero'=>'required',
        'direccion_tercero'=>'required',
        //'cp_tercero'=>'required',
        //'ciudad_tercero'=>'required',
        //'estado_tercero'=>'required',
        //'pais_tercero'=>'required',
        'nombre_fiscal'=>'required',
        'rfc'=>'required',
        'direccion_fiscal'=>'required',
        //'colonia_fiscal'=>'required',
        //'codigo_postal_fiscal'=>'required',
        //'estado_fiscal'=>'required',
        //'ciudad_fiscal'=>'required',
        //'nombre_agente_aduanal'=>'required',
        //'direccion_agente'=>'required',
        //'condicion_pago_tipo'=>'required',
        //'condicion_pago_marca'=>'required',
        //'condicion_pago_tiempo'=>'required',
        //'atribuir'=>'required',
        //'gerente'=>'required',
        //'total'=>'required',
        'tipo_cambio'=>'required',
        'tipo_moneda'=>'required',
        'metodo_pago'=>'required',
        //'tipo_envio'=>'required',
        //'id_camp_publ'=>'required',
        'org_name'=>'required',
        //'id_doctype_target'=>'required',
        //'c_bpartner_location'=>'required',
        //'id_warehouse'=>'required',
        'condicion_facturacion'=>'required',
        'c_bpartner_id'=>'required',
        //'org_id'=>'required',
        //'centro_costo'=>'required',
        ];
    }
}
