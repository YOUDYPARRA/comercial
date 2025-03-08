<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |  following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El :attribute aceptarse.',
    'active_url'           => 'El :attribute no es un URL valido.',
    'after'                => 'La :attribute debe ser una despues de :date.',
    'alpha'                => ' :attribute Solo puede contener letras.',
    'alpha_dash'           => ' :attribute Solo puede contener, númerico,  y guiones.',
    'alpha_num'            => 'El :attribute Solo puede contener letras y números.',
    'array'                => 'El :attribute Debe ser arreglo.',
    'before'               => 'El :attribute debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => 'El :attribute Debe estar entre :min y :max.',
        'file'    => 'El :attribute Debe estar entre :min and :max kilobytes.',
        'string'  => 'El :attribute Debe estar entre :min and :max characters.',
        'array'   => 'El :attribute Debe tener entre :min and :max items.',
    ],
    'boolean'              => 'El :attribute El campo debe ser true or false.',
    'confirmed'            => ' :attribute Confirmacion no coincide.',
    'date'                 => 'La :attribute fecha invalida.',
    'date_format'          => ' :attribute No coincide con el formato :format.',
    'different'            => ' :attribute y :other debe ser diferente.',
    'digits'               => ' :attribute debe ser :digits digitos.',
    'digits_between'       => ' :attribute debe ser entre :min y :max digitos.',
    'email'                => ' :attribute debe ser mail valido.',
    'filled'               => ' :attribute campo obligatorio.',
    'exists'               => ' seleccionado :attribute es invalido.',
    'image'                => ' :attribute debe ser imagen.',
    'in'                   => ' seleccionado :attribute es invalido.',
    'integer'              => ' :attribute debe ser entero.',
    'ip'                   => ' :attribute debe ser un direccion IP.',
    'max'                  => [
        'numeric' => ' :attribute no puede ser mas grande que  :max.',
        'file'    => ' :attribute no puede ser mas grande que :max kilobytes.',
        'string'  => ' :attribute no puede ser mas grande que :max characters.',
        'array'   => ' :attribute no puede tener mas que :max items.',
    ],
    'mimes'                => ' :attribute debe ser un archivo type: :values.',
    'min'                  => [
        'numeric' => ' :attribute debe tener al menos :min.',
        'file'    => ' :attribute debe tener al menos :min kilobytes.',
        'string'  => ' :attribute debe tener al menos :min caracteres.',
        'array'   => ' :attribute debe tener al menos :min items.',
    ],
    'not_in'               => ' seleccion :attribute es invalido.',
    'numeric'              => ' :attribute debe ser númerico.',
    'regex'                => ' :attribute formato invalido.',
    'required'             => ' :attribute campo requerido.',
    'required_if'          => ' :attribute campo requerido cuando :other es :value.',
    'required_with'        => ' :attribute campo requerido cuando :values es presente.',
    'required_with_all'    => ' :attribute campo requerido cuando :values no es presente.',
    'required_without'     => ' :attribute campo requerido cuando :values no es presente.',
    'required_without_all' => ' :attribute campo requerido cuando no hay  :values presentes.',
    'same'                 => ' :attribute and :other must match.',
    'size'                 => [
        'numeric' => ' :attribute debe ser :size.',
        'file'    => ' :attribute debe ser :size kilobytes.',
        'string'  => ' :attribute debe ser :size characters.',
        'array'   => ' :attribute debe contener :size items.',
    ],
    'timezone'             => ' :attribute debe ser zona valida.',
    'unique'               => ' :attribute ya ha sido usado.',
    'url'                  => ' :attribute formato es invalido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    |  following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
