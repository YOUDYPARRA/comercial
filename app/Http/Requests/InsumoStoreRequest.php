<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InsumoStoreRequest extends Request
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
     //       'estado'=>'sometimes|required',
            'bandera_insumo'=>'required',
            'codigo_proovedor'=>'required',
            //'modelo'=>'required',
            'precio'=>'sometimes|numeric|digits_between:1,10000',
            'costos'=>'required|numeric|digits_between:1,10000',
            //'unidades_minimo_compra'=>'required',
            'cantidad_unidad_compra'=>'required',
            'costos'=>'required',
            'costo_moneda'=>'required',
            'unidad_compra'=>'required',
            'unidad_medida'=>'required',
            'tipo_cambio'=>'required',
            'marca'=>'required|numeric|digits_between:1,10000',
            'marca'=>'required',
            'descripcion'=>'required|max:250',
            //'caracteristicas'=>'max:250',
            //'especificaciones'=>'max:250',
            'categoria1'=>'max:29',
        //    'categoria2'=>'max:29',
        //    'categoria3'=>'max:29',
         //   'unidad_compra'=>'required|digits_between:3,90'
        ];
    }
}
