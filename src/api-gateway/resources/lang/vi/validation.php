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

    'accepted'        => 'The :attribute must be accepted.',
    'active_url'      => 'The :attribute is not a valid URL.',
    'after'           => 'The :attribute must be a date after :date.',
    'after_or_equal'  => 'The :attribute must be a date after or equal to :date.',
    'alpha'           => 'The :attribute may only contain letters.',
    'alpha_dash'      => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num'       => 'The :attribute may only contain letters and numbers.',
    'array'           => 'The :attribute must be an array.',
    'before'          => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between'         => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'        => 'The :attribute field must be true or false.',
    'confirmed'      => 'The :attribute confirmation does not match.',
    'date'           => 'The :attribute is not a valid date.',
    'date_equals'    => 'The :attribute must be a date equal to :date.',
    'date_format'    => 'The :attribute does not match the format :format.',
    'different'      => 'The :attribute and :other must be different.',
    'digits'         => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions'     => 'The :attribute has invalid image dimensions.',
    'distinct'       => 'The :attribute field has a duplicate value.',
    'email'          => '?????a ch??? email kh??ng h???p l???',
    'phone'          => 'S??? ??i???n tho???i kh??ng h???p l???.',
    'ends_with'      => 'The :attribute must end with one of the following: :values',
    'exists'         => 'The selected :attribute is invalid.',
    'file'           => 'The :attribute must be a file.',
    'filled'         => 'The :attribute field must have a value.',
    'gt'             => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'    => 'The :attribute must be an image.',
    'in'       => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer'  => 'Tr?????ng :attribute ph???i l?? ch??? s???.',
    'ip'       => 'The :attribute must be a valid IP address.',
    'ipv4'     => 'The :attribute must be a valid IPv4 address.',
    'ipv6'     => 'The :attribute must be a valid IPv6 address.',
    'json'     => 'The :attribute must be a valid JSON string.',
    'lt'       => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'     => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min'       => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'password'             => 'The password is incorrect.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'Tr?????ng :attribute l?? b???t bu???c.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values are present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'starts_with'  => 'The :attribute must start with one of the following: :values',
    'string'       => 'The :attribute must be a string.',
    'timezone'     => 'The :attribute must be a valid zone.',
    'unique'       => 'Tr?????ng :attribute ???? t???n t???i.',
    'unique_email' => '?????a ch??? email ???? t???n t???i.',
    'uploaded'     => 'The :attribute failed to upload.',
    'url'          => 'The :attribute format is invalid.',
    'uuid'         => 'The :attribute must be a valid UUID.',

    'fullname_min' => 'The :attribute must be a valid UUID.',
    'fullname_max' => 'The :attribute must be a valid UUID.',

    'amount_required' => 'S??? ti???n l?? b???t bu???c.',
    'amount_min'      => 'S??? ti???n ph???i t???i thi???u l?? :min ??.',
    'amount_integer'  => 'S??? ti???n ph???i l?? ch??? s???.',

    'period_time_required' => 'Kho???ng th???i gian l?? b???t bu???c.',
    'period_time_integer'  => 'Kho???ng th???i gian ph???i l?? ch??? s???.',

    'phone_required'   => 'S??? ??i???n tho???i l?? b???t bu???c.',
    'phone_unique'     => 'S??? ??i???n tho???i ???? t???n t???i.',
    'phone_not_exists' => 'S??? ??i???n tho???i ch??a t???n t???i.',

    'payment_method_type_required' => 'Ph????ng th???c thanh to??n l?? b???t bu???c.',
    'payment_method_type'          => 'Ph????ng th???c thanh to??n kh??ng h???p l???.',

    'password_required'     => 'M???t kh???u l?? b???t bu???c.',
    'new_password_required' => 'M???t kh???u m???i l?? b???t bu???c.',
    'password_valid'        => 'M???t kh???u ph???i c?? ????? d??i ??t nh???t 6 k?? t??? bao g???m: ch??? th?????ng, ch??? in hoa v?? ??t nh???t m???t s??? (0-9) ho???c k?? hi???u (@#)',

    'upload_images' => [
        'error' => 'Tr?????ng :attribute kh??ng h???p l???.',
        'array' => 'Tr?????ng :attribute ph???i l?? ki???u m???ng.',
        'image' => 'Ph???n t??? c???a tr?????ng :attribute ph???i l?? ki???u ???nh.',
        'limit' => 'Tr?????ng :attribute ch??? cho ph??p t???i ??a 6 ???nh.',
    ],

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
        //        'amount' => [
        //            'min' => [
        //                'numeric' => 'S??? ti???n.',
        //                'string' => 'The :attribute must be at least :min characters.',
        //            ],
        //        ]
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

    'attributes' => [
    ],
];
