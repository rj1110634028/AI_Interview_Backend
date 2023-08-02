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

    'accepted' => ':attribute必須被接受',
    'active_url' => ':attribute不是有效的網址',
    'after' => ':attribute必須為 :date 之後的日期',
    'after_or_equal' => ':attribute必須為 :date 之後或相同的日期',
    'alpha' => ':attribute只能包含字母',
    'alpha_dash' => ':attribute只能包含字母、數字、破折號和底線',
    'alpha_num' => ':attribute只能包含字母和數字',
    'array' => ':attribute必須是一個陣列',
    'before' => ':attribute必須是 :date 之前的日期',
    'before_or_equal' => ':attribute必須是 :date 之前或相同的日期',
    'between' => [
        'numeric' => ':attribute必須介於 :min 和 :max 之間',
        'file' => ':attribute必須介於 :min 和 :max KB 之間',
        'string' => ':attribute必須介於 :min 和 :max 個字元之間',
        'array' => ':attribute必須有 :min - :max 個元素',
    ],
    'boolean' => ':attribute必須是布林值',
    'confirmed' => ':attribute確認欄位輸入不一致',
    'current_password' => '密碼不正確',
    'date' => ':attribute不是有效的日期',
    'date_equals' => ':attribute必須是 :date 之後的日期',
    'date_format' => ':attribute的格式必須是 :format',
    'different' => ':attribute和 :other 必須不同',
    'digits' => ':attribute必須是 :digits 位數字',
    'digits_between' => ':attribute必須是介於 :min 和 :max 位數字',
    'dimensions' => ':attribute圖片尺寸不正確',
    'distinct' => ':attribute有重複的值',
    'email' => ':attribute欄位必須是有效的電子郵件地址',
    'ends_with' => ':attribute必須以 :values 結尾',
    'exists' => '選定的:attribute無效',
    'file' => ':attribute必須是檔案',
    'filled' => ':attribute不得為空',
    'gt' => [
        'numeric' => ':attribute必須大於 :value',
        'file' => ':attribute必須大於 :value KB',
        'string' => ':attribute長度必須多於 :value 字元',
        'array' => ':attribute欄位必須多於 :value 個項目',
    ],
    'gte' => [
        'numeric' => ':attribute必須大於或等於 :value',
        'file' => ':attribute必須大於或等於 :value KB',
        'string' => ':attribute必須多於或等於 :value 個字元',
        'array' => ':attribute欄位必須多於或等於 :value 個項目',
    ],
    'image' => ':attribute必須是圖片',
    'in' => '選定的:attribute無效',
    'in_array' => ':attribute不存在於 :other',
    'integer' => ':attribute必須是整數',
    'ip' => ':attribute必須是有效的 IP 地址',
    'ipv4' => ':attribute必須是有效的 IPv4 地址',
    'ipv6' => ':attribute必須是有效的 IPv6 地址',
    'json' => ':attribute必須是正確的 JSON 字串',
    'lt' => [
        'numeric' => ':attribute必須小於 :value',
        'file' => ':attribute必須小於 :value KB',
        'string' => ':attribute長度必須少於 :value 字元',
        'array' => ':attribute欄位必須少於 :value 個項目',
    ],
    'lte' => [
        'numeric' => ':attribute必須小於或等於 :value',
        'file' => ':attribute必須小於或等於 :value KB',
        'string' => ':attribute長度必須少於或等於 :value 個字元',
        'array' => ':attribute欄位必須少於或等於 :value 個項目',
    ],
    'mac_address' => ':attribute必須是有效的 MAC 位址',
    'max' => [
        'numeric' => ':attribute不得大於 :max',
        'file' => ':attribute不得大於 :max KB',
        'string' => ':attribute長度不得多於 :max 個字元',
        'array' => ':attribute欄位不得多於 :max 個項目',
    ],
    'max_digits' => ':attribute最多只能有 :digits 位數字',
    'mimes' => ':attribute必須是 :values 類型的檔案',
    'mimetypes' => ':attribute必須是 :values 類型的檔案',
    'min' => [
        'numeric' => ':attribute不得小於 :min',
        'file' => ':attribute不得小於 :min KB',
        'string' => ':attribute長度不得少於 :min 個字元',
        'array' => ':attribute欄位不得少於 :min 個項目',
    ],
    'not_in' => '選定的:attribute無效',
    'not_regex' => ':attribute格式無效',
    'numeric' => ':attribute必須是數字',
    'present' => ':attribute必須存在',
    'regex' => ':attribute格式無效',
    'required' => ':attribute不得為空',
    'required_array_keys' => ':attribute必須包含 :values',
    'required_if' => '當 :other 是 :value 時:attribute不得為空',
    'required_unless' => '當 :other 不是 :values 時:attribute不得為空',
    'required_with' => '當 :values 存在時:attribute不得為空',
    'required_with_all' => '當 :values 存在時:attribute不得為空',
    'required_without' => '當 :values 不存在時:attribute不得為空',
    'required_without_all' => '當 :values 都不存在時:attribute不得為空',
    'same' => ':attribute必須與 :other 相同',
    'size' => [
        'numeric' => ':attribute必須是 :size',
        'file' => ':attribute必須是 :size KB',
        'string' => ':attribute必須是 :size 個字元',
        'array' => ':attribute必須包含 :size 個元素',
    ],
    'starts_with' => ':attribute必須以 :values 開頭',
    'string' => ':attribute必須是字串',
    'timezone' => ':attribute必須是有效的時區值',
    'unique' => ':attribute已經存在',
    'uploaded' => ':attribute上傳失敗',
    'url' => ':attribute格式無效',
    'uuid' => ':attribute必須是有效的 UUID',
    'phone' => ':attribute欄位必須是有效的電話號碼',
    'accepted_if' => ':attribute在 :other 為 :value 時必須被接受',
    'declined' => ':attribute必須被拒絕',
    'declined_if' => ':attribute在 :other 為 :value 時必須被拒絕',
    'doesnt_end_with' => ':attribute不應以以下值結尾： :values',
    'doesnt_start_with' => ':attribute不應以以下值開頭： :values',
    'enum' => '選中的:attribute無效',
    'min_digits' => ':attribute必須至少為 :min 位數',
    'multiple_of' => ':attribute必須為 :value 的倍數',
    'password' => [
        'letters' => ':attribute必須至少有一個字母',
        'mixed' => ':attribute必須包含至少一個大寫字母和至少一個小寫字母',
        'numbers' => ':attribute必須至少有一個數字',
        'symbols' => ':attribute必須至少有一個符號',
        'uncompromised' => '提供的:attribute似乎被外洩過，請提供不同的:attribute',
    ],
    'prohibited' => ':attribute欄位被禁止',
    'prohibited_if' => ':attribute欄位在 :other 為 :value 時被禁止',
    'prohibited_unless' => ':attribute欄位在 :other 不為 :value 時被禁止',
    'prohibits' => ':attribute欄位禁止與 :other 欄位同時存在',

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

    'attributes' => [
        'name'=>'姓名',
        'sex'=>'姓別',
        'email'=>'電子信箱',
        'password'=>'密碼',
    ],

];
