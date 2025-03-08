<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgenteAduanalStoreRequest extends Request
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
        'agente_aduanal'=>'required|max:90',
        'telefono'=>'required|numeric|min:10',
        'ubicacion'=>'required|max:110',
        'fax'=>'sometimes|required|numeric|min:10',
        //'email'=>'sometimes|required|email',
        ];
    }
}
