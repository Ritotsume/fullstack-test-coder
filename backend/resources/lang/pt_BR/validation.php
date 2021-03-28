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

    'accepted' => 'O :attribute deve ser aceito.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'O :attribute deve ser uma data depois de :date.',
    'after_or_equal' => 'O :attribute deve ser uma data depois de ou igual a :date.',
    'alpha' => 'O :attribute pode conter somente letras.',
    'alpha_dash' => 'O :attribute pode conter somente letras, números, traços e sublinhados.',
    'alpha_num' => 'O :attribute pode conter somente letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser uma data antes de :date.',
    'before_or_equal' => 'O :attribute deve ser uma data antes de ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file' => 'O :attribute deve ter entre :min e :max kilobytes.',
        'string' => 'O :attribute deve ter entre :min e :max caracteres.',
        'array' => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve ser true ou false.',
    'confirmed' => 'O :attribute confirmação não corresponde.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute não corresponde ao formato :format.',
    'different' => 'O :attribute e :other devem ser diferentes.',
    'digits' => 'O :attribute deve ter :digits dígitos.',
    'digits_between' => 'O :attribute deve conter entre :min and :max dígitos.',
    'dimensions' => 'O :attribute tem dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute tem um valor duplicado.',
    'email' => 'O :attribute deve ser um endereço de email válido.',
    'ends_with' => 'O :attribute deve terminar com um dos seguintes: :values.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O :attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'string' => 'O :attribute deve ter mais que :value caracteres.',
        'array' => 'O :attribute deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute não pode ser menor que :value.',
        'file' => 'O :attribute deve ter :value kilobytes ou mais.',
        'string' => 'O :attribute deve ter :value caracteres ou mais.',
        'array' => 'O :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O :attribute deve ser uma imagem.',
    'in' => 'O :attribute selecionado é inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O :attribute deve ser um inteiro.',
    'ip' => 'O :attribute deve ser um endereço de IP válido.',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file' => 'O :attribute deve ter menos que :value kilobytes.',
        'string' => 'O :attribute deve ter menos que :value caracteres.',
        'array' => 'O :attribute deve ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser menor ou igual a :value.',
        'file' => 'O :attribute deve ter :value kilobytes ou menos.',
        'string' => 'O :attribute deve ter :value caracteres ou menos.',
        'array' => 'O :attribute não deve ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file' => 'O :attribute não deve ter mais que :max kilobytes.',
        'string' => 'O :attribute não deve ter mais que :max caracteres.',
        'array' => 'O :attribute não deve ter mais que :max itens.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file' => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string' => 'O :attribute deve ter pelo menos :min caracteres.',
        'array' => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'multiple_of' => 'O :attribute deve ser um múltiplo de :value',
    'not_in' => 'O :attribute selecionado é inválido.',
    'not_regex' => 'O formato :attribute é inválido.',
    'numeric' => 'O :attribute deve ser um número.',
    'password' => 'A password está incorreta.',
    'present' => 'O campo :attribute deve estar presente.',
    'regex' => 'O formato :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é requerido quando :other for :value.',
    'required_unless' => 'O campo :attribute é requerido a menos que :other estiver em :values.',
    'required_with' => 'O campo :attribute é requerido quando :values estiver presente.',
    'required_with_all' => 'O campo :attribute é requerido quando :values estiverem presentes.',
    'required_without' => 'O campo :attribute é requerido quando :values não estiver presente.',
    'required_without_all' => 'O campo :attribute é requerido quando nada de :values estiverem presentes.',
    'same' => 'O :attribute e :other devem corresponder.',
    'size' => [
        'numeric' => 'O :attribute deve ser :size.',
        'file' => 'O :attribute deve ter :size kilobytes.',
        'string' => 'O :attribute deve ter :size caracteres.',
        'array' => 'O :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O :attribute deve iniciar com um dos seguintes: :values.',
    'string' => 'O :attribute deve ser uma string.',
    'timezone' => 'O :attribute deve ser uma zona válida.',
    'unique' => 'O :attribute já foi usado.',
    'uploaded' => 'O :attribute falhou ao fazer upload.',
    'url' => 'O formato :attribute é inválido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
