<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProyectoVentaStoreRequest extends Request
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
        //'fecha_inicio_garantia'=>'sometimes|date_format:d-m-Y',
        'fecha_inicio'=>'required|date_format:d-m-Y',
        'canal'=>'required',
        'instituto'=>'required',
        'autor'=>'required',
        'sucursal'=>'required',
        'equipo'=>'required',
        'modelo'=>'required',
        'nombre_cliente'=>'required',
        'estado'=>'required',
        'ciudad'=>'required',
        'compromiso'=>'required',
        ];
    }
    public function messages()
{
    return [
        //'instituto.required' => 'El número de contrato debe ser obligatorio'
    ];
}
}
