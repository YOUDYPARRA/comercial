<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArchivoDigitalStoreRequest extends Request
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
            'file' => 'required|mimes:jpg,jpeg,pdf,rar|between:2,6772',
            'id' => 'required'
        ];
    }
}
