<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioUpdateRequest extends Request
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
            'name'=>'required|max:250',
            'iniciales'=>'required',
            'email'=>'required',
            'puesto'=>'required',
            'area'=>'required',
            'departamento'=>'required',
            'lugar_centro_costo'=>'required',
            'tipo_usuario'=>'required'
        ];
    }
}
