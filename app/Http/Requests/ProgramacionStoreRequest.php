<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProgramacionStoreRequest extends Request
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
            'condicion_servicio' => 'required',
            'tipo_servicio' => 'required',
            'fecha_inicio' => 'required|date_format:d-m-Y',
            'fecha_fin' => 'required|date_format:d-m-Y',
            'nombre_fiscal' => 'required',
            'equipo' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'hora_atencion' => 'required',
            'asistencia' => 'required',
            'sucursal' => 'required',
        ];
    }
}
