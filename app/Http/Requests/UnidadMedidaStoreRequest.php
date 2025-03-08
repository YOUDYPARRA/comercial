<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UnidadMedidaStoreRequest extends Request
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
    public function rules(){
        return [
            'p_codigo_edi'=>'required',
            'p_name'=>'required|unique:unidades_medidas,p_name',
            //'p_codigo_edi'=>'required|digits_between:1,2',
            //'p_user_id'=>'required',
            //'p_symbol'=>'required',
            //'p_description'=>'sometimes|digits_between:4,150',
            //'p_std_precision'=>'required|numeric',
            //'p_costing_precision'=>'required|numeric',
            //'p_uom_type'=>'required'
        ];
    }
       public function messages()
{
    return [
        'p_codigo_edi.required' => 'Unidad base para medida debe ser obligatorio'
    ];
}
}
