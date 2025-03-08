<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AlmaceStockStoreRequest extends Request
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
        'id_insumo'=>'required',
        'codigo_proovedor'=>'required',
        'm_product_id'=>'required',
        'org_name'=>'required',
        'aviso'=>'required',
        'tiempo_respuesta'=>'required',
        'almacen'=>'required',
        'id_warehouse'=>'required',
        'punto_pedido'=>'required',
        'porcentaje_seguridad'=>'required',
        'calcular'=>'required'
        ];
    }
    public function messages()
    {
        return [
        'id_warehouse.required' => 'El almacen es obligatorio'
        ];
    }
}
