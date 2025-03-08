<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ObservacionStoreRequest extends Request
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
        'nombre_tipo'=>'required|max:90',
        'id_producto'=>'required|max:90',
        'observacion'=>'required|max:1000'

        ];
    }
}
