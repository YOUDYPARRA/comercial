<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContratoStoreRequest extends Request
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
        'fecha_inicio_contrato'=>'required|date_format:d-m-Y',
        'fecha_fin_contrato'=>'required|date_format:d-m-Y',
        //'fecha_fin_garantia'=>'sometimes|date_format:d-m-Y',
        'equipos'=>'required|array',
        //'refacciones'=>'required',
        'refacciones_excepciones'=>'required',
        'limite_atencion'=>'required',
        //'folio_contrato'=>'required',
        //'instituto'=>'required|unique:clases,instituto'
        ];
    }
    public function messages()
{
    return [
        //'instituto.required' => 'El número de contrato debe ser obligatorio'
    ];
}
}
