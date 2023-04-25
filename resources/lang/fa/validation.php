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


    'accepted'             => ' :attribute باید تایید شود',
    'active_url'           => ' :attribute یک آدرس صحیح نیست',
    'after'                => ' :attribute باید تاریخی بعد از تاریخ :date باشد',
    'after_or_equal'       => ' :attribute باید یک تاریخ بعد یا مساوی :date باشد.',
    'alpha'                => ' :attribute باید فقط شامل کلمات باشد',
    'alpha_dash'           => ' :attribute باید فقط شامل کلمات، اعداد و علامت خط تیره باشد',
    'alpha_num'            => ' :attribute باید فقط شامل کلمات و اعداد باشد',
    'array'                => ' :attribute باید یک آرایه باشد',
    'before'               => ' :attribute باید تاریخی قبل از تاریخ :date باشد',
    'before_or_equal'      => ' :attribute باید یک تاریخ قبل یا مساوی :date باشد.',
    'between'              => [
        'numeric' => ' :attribute باید بین :min و :max باشد',
        'file'    => ' :attribute باید بین :min و :max کیلوبایت باشد',
        'string'  => ' :attribute باید بین :min و :max کاراکتر باشد',
        'array'   => ' :attribute باید بین :min و :max آیتم باشد',
    ],
    'boolean'              => ' :attribute باید مقدار صحیح یا غلط داشته باشد',
    'confirmed'            => ' :attribute مطابقت ندارد',
    'date'                 => ' :attribute یک تاریخ صحیح نیست',
    'date_format'          => ' :attribute با فرمت :format همخوانی ندارد',
    'different'            => ' :attribute و :other نباید شبیه به هم باشند',
    'digits'               => ' :attribute باید دارای :digits رقم باشد',
    'digits_between'       => ' :attribute باید بین :min و :max رقم باشد',
    'dimensions'           => ' :attribute دارای ابعاد مناسب نیست',
    'distinct'             => ' :attribute دارای یک مقدار تکراری است',
    'email'                => ' :attribute باید یک آدرس ایمیل قابل قبول باشد',
    'file'                 => ' :attribute باید یک فایل باشد',
    'filled'               => ' :attribute یک فیلد ضروری است',
    'exists'               => ' :attribute انتخاب شده معتبر نیست',
    'image'                => ' :attribute باید یک عکس باشد',
    'in'                   => ' :attribute نادرست است',
    'in_array'             => ' :attribute در :other وجود ندارد',
    'integer'              => ' :attribute باید مقدار عددی باشد',
    'ip'                   => ' :attribute باید یک آدرس آی پی صحیح باشد',
    'ipv4'                 => ' :attribute باید یک آدرس IPv4 باشد',
    'ipv6'                 => ' :attribute باید یک آدرس IPv6 باشد',
    'json'                 => ' :attribute باید یک مقدار صحیح جی‌سان باشد.',
    'max'                  => [
        'numeric' => ' :attribute نباید بیشتر از :max باشد',
        'file'    => ' :attribute نباید بیشتر از :max کیلوبایت باشد',
        'string'  => ' :attribute نباید بیشتر از :max کاراکتر باشد',
        'array'   => ' :attribute نباید بیشتر از :max آیتم داشته باشد',
    ],
    'media'                => ' :attribute باید از نوع :values باشد',
    'mimes'                => ' :attribute باید فایلی از نوع :values باشد',
    'mimetypes'            => ' :attribute باید یک فایل از نوع: :values باشد',
    'min'                  => [
        'numeric' => ' :attribute نباید کمتر از :min باشد',
        'file'    => ' :attribute نباید کمتر از :min کیلوبایت باشد',
        'string'  => ' :attribute نباید کمتر از :min کاراکتر باشد',
        'array'   => ' :attribute نباید کمتر از :min آیتم داشته باشد',
    ],
    'not_in'               => ' :attribute انتخاب شده نامعتبر است',
    'numeric'              => ' :attribute باید یک مقدار عددی باشد',
    'present'              => ' :attribute باید وجود داشته باشد',
    'regex'                => 'فرمت :attribute نادرست است',
    'required'             => 'فیلد :attribute ضروری است',
    'required_if'          => 'فیلد :attribute ضروری است وقتی :other دارای مقدار :value باشد',
    'required_unless'      => ':attribute ضروری است مگر اینه :other وجود داشته باشد در :values.',
    'required_with'        => 'فیلد :attribute ضروری است وقتی :values وجود داشته باشد',
    'required_with_all'    => 'فیلد :attribute ضروری است وقتی :values وجود داشته باشد',
    'required_without'     => 'فیلد :attribute ضروری است وقتی :values وجود ندارد',
    'required_without_all' => 'فیلد :attribute ضروری است وقتی وقتی هیچ یک از مقادیر :values وجود ندارند',
    'same'                 => ' :attribute و :other باید مطابقت داشته باشند',
    'size'                 => [
        'numeric' => ' :attribute باید :size رقم باشد',
        'file'    => ' :attribute باید :size کیلوبایت باشد',
        'string'  => ' :attribute باید :size کاراکتر باشد',
        'array'   => ' :attribute باید شامل :size آیتم باشد',
    ],
    'string'               => ' :attribute باید یک رشته باشد',
    'timezone'             => ' :attribute باید حاوی یک منطقه زمانی صحیح باشد',
    'unique'               => ' :attribute قبلا انتخاب شده است',
    'uploaded'             => ' :attribute آپلود نشد',
    'url'                  => ' :attribute دارای فرمت نامعتبر است',

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

        'g-recaptcha-response' => [
            'required' => 'لطفا تیک گزینه من ربات نیستم را فعال کنید',
            'captcha'  => 'خطا، لطفا دوبار امتحان کنید',
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
        'username'              => 'نام کاربری',
        'avatar_id'             => 'شناسه کاربری',
        'phone'                 => 'شماره تلفن',
        'user_id'               => 'شناسه کاربر',
        'social_id'             => 'شبکه اجتماعی',
        'email'                 => 'ایمیل',
        'password'              => 'کلمه عبور',
        'token'                 => 'توکن',
        'name'                  => 'نام',
        'card_id'               => 'شناسه کارت',
        'favicon'               => 'فاوآیکن',
        'old'                   => 'رمز عبور فعلی',
        'password_confirmation' => 'تکرار رمز عبور جدید',
        'creator_id'            => 'ادمین',
        'file'                  => 'فایل',
        'image'                 => 'عکس',
        'video'                 => 'ویدیو',
        'audio'                 => 'صدا',
        'product_od'            => 'شناسه محصول',
        'order_id'              => 'شناسه سفارش',
        'cart_id'               => 'شناسه سفارش',
        'count'                 => 'تعداد',
        'sex'                   => 'جنسیت',
        'version'               => 'ورژن',
        'device'                => 'نوع دستگاه',
        'hash'                  => 'هش',
        'correct_answer'        => 'پاسخ صحیح',
        'serial'                => 'سریال',
        'purchasable_id'        => 'شناسه خریدنی',
        'purchasable_type'      => 'نوع خریدنی',
        'quiz_chance'           => 'شانس کوییز',
        'test_chance'           => 'شانس تست',
        'prize_chance'          => 'شانس جایزه',
        'category'              => 'دسته بندی',
        'type'                  => 'نوع',
        'question_count'        => 'تعداد سوالات',
        'answer_count'          => 'تعداد جوابها',
        'invite_code'           => 'کد معرف',
//        'upload'            => 'آپلود PDF',
        'minimum_ver'           => 'نسخه حداقل',
        'latest_ver'            => 'آخرین نسخه',
        'title'                 => 'عنوان',
        'description'           => 'توضیحات',

        'teaching_institution_id' => 'مجموعه آزمایشی',
        'price'                 => 'قیمت',
        'answer'                => 'متن پاسخ',
    ],

    /*
    |--------------------------------------------------------------------------
    | My Extra Validation Messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to my custom validations
    |
    */

    "recaptcha" => 'عبارت امنیتی صحیح نیست',
];
