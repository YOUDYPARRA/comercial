<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContratoUpdateRequest extends Request
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
       // 'fecha_inicio_garantia'=>'required|date_format:d-m-Y',
        //'fecha_fin_garantia'=>'required|date_format:d-m-Y',
        'equipos'=>'required|array',
      //  'refacciones'=>'required',
        'refacciones_excepciones'=>'required',
        'limite_atencion'=>'required',
       // 'instituto'=>'required',
        'folio_contrato'=>'required'
        ];
    }
}
