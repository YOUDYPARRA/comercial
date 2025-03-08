<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequisicionStoreRequest extends Request
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
            //'fecha_inicio' => 'required|date_format:d-m-Y',
            'insumos' => 'required|array',
            //'nombre_responsable' => 'required',
            //'nombre_cliente' => 'required',
            //'equipo' => 'required',
            //'marca' => 'required',
            //'modelo' => 'required',
            //'numero_serie' => 'required',
            //'hora_atencion' => 'required',
            //'nota_cliente'=>'required|max:1000'
            //'subtotal'=>'required'

        ];
    }
}
