<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Este campo debe ser aceptado.',
    'active_url'           => 'Este campo no es una URL válida.',
    'after'                => 'Este campo debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'Este campo debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'Este campo solo puede contener letras.',
    'alpha_dash'           => 'Este campo solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => 'Este campo solo puede contener letras y números.',
    'array'                => 'Este campo debe ser un array.',
    'before'               => 'Este campo debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'Este campo debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'Este campo debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'Este campo debe contener entre :min y :max caracteres.',
        'array'   => 'Este campo debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'Este campo debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'date'                 => 'Este campo no corresponde con una fecha válida.',
    'date_equals'          => 'Este campo debe ser una fecha igual a :date.',
    'date_format'          => 'Este campo no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'               => 'Este campo debe ser un número de :digits dígitos.',
    'digits_between'       => 'Este campo debe contener entre :min y :max dígitos.',
    'dimensions'           => 'Este campo tiene dimensiones de imagen inválidas.',
    'distinct'             => 'Este campo tiene un valor duplicado.',
    'email'                => 'Este campo debe ser una dirección de correo válida.',
    'ends_with'            => 'Este campo debe finalizar con alguno de los siguientes valores: :values',
    'exists'               => 'Este campo seleccionado no existe.',
    'file'                 => 'Este campo debe ser un archivo.',
    'filled'               => 'Este campo debe tener un valor.',
    'gt'                   => [
        'numeric' => 'Este campo debe ser mayor a :value.',
        'file'    => 'El archivo :attribute debe pesar más de :value kilobytes.',
        'string'  => 'Este campo debe contener más de :value caracteres.',
        'array'   => 'Este campo debe contener más de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => 'Este campo debe ser mayor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o más kilobytes.',
        'string'  => 'Este campo debe contener :value o más caracteres.',
        'array'   => 'Este campo debe contener :value o más elementos.',
    ],
    'image'                => 'Este campo debe ser una imagen.',
    'in'                   => 'Este campo es inválido.',
    'in_array'             => 'Este campo no existe en :other.',
    'integer'              => 'Este campo debe ser un número entero.',
    'ip'                   => 'Este campo debe ser una dirección IP válida.',
    'ipv4'                 => 'Este campo debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'Este campo debe ser una dirección IPv6 válida.',
    'json'                 => 'Este campo debe ser una cadena de texto JSON válida.',
    'lt'                   => [
        'numeric' => 'Este campo debe ser menor a :value.',
        'file'    => 'El archivo :attribute debe pesar menos de :value kilobytes.',
        'string'  => 'Este campo debe contener menos de :value caracteres.',
        'array'   => 'Este campo debe contener menos de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => 'Este campo debe ser menor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o menos kilobytes.',
        'string'  => 'Este campo debe contener :value o menos caracteres.',
        'array'   => 'Este campo debe contener :value o menos elementos.',
    ],
    'max'                  => [
        'numeric' => 'Este campo no debe ser mayor a :max.',
        'file'    => 'El archivo :attribute no debe pesar más de :max kilobytes.',
        'string'  => 'Este campo no debe contener más de :max caracteres.',
        'array'   => 'Este campo no debe contener más de :max elementos.',
    ],
    'mimes'                => 'Este campo debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'Este campo debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'Este campo debe ser al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'Este campo debe contener al menos :min caracteres.',
        'array'   => 'Este campo debe contener al menos :min elementos.',
    ],
    'not_in'               => 'Este campo seleccionado es inválido.',
    'not_regex'            => 'El formato de este campo es inválido.',
    'numeric'              => 'Este campo debe ser un número.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'Este campo debe estar presente.',
    'regex'                => 'El formato de este campo es inválido.',
    'required'             => 'Este campo es obligatorio.',
    'required_if'          => 'Este campo es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'Este campo es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'Este campo es obligatorio cuando :values está presente.',
    'required_with_all'    => 'Este campo es obligatorio cuando :values están presentes.',
    'required_without'     => 'Este campo es obligatorio cuando :values no está presente.',
    'required_without_all' => 'Este campo es obligatorio cuando ninguno de los campos :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'Este campo debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'Este campo debe contener :size caracteres.',
        'array'   => 'Este campo debe contener :size elementos.',
    ],
    'starts_with'          => 'Este campo debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'Este campo debe ser una cadena de caracteres.',
    'timezone'             => 'Este campo debe ser una zona horaria válida.',
    'unique'               => 'El valor de este campo ya está en uso.',
    'uploaded'             => 'Este campo no se pudo subir.',
    'url'                  => 'El formato de este campo es inválido.',
    'uuid'                 => 'Este campo debe ser un UUID válido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'nombre',
        'image' => 'imagen',
        'first_name' => 'nombre',
        'last_name' => 'primer apellido',
        'start_day' => 'fecha de inicio',
        'end_day' => 'fecha fin',
        'registration_day' => 'fecha de registro',
    ],

];
