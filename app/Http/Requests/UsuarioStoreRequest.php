<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioStoreRequest extends Request
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
            'password'=>'required',
            'name'=>'required|max:250',
            'iniciales'=>'required',
            'email'=>'required',
            'puesto'=>'required',
            'area'=>'required',
            'departamento'=>'required',
            'lugar_centro_costo'=>'required',
            'tipo_usuario'=>'required',
//            'modelo'=>'required',
//            'precio'=>'digits_between:1,10000',
//            'costos'=>'required|digits_between:1,10000',
//            'unidad_medida'=>'required',
//            'tipo_cambio'=>'required',
//            'marca'=>'min:2',
//            'descripcion'=>'required|max:250',
//            'caracteristicas'=>'max:250',
//            'especificaciones'=>'max:250',
//            'categoria1'=>'max:29',
//            'categoria2'=>'max:29',
//            'categoria3'=>'max:29',
        ];
    }
}
