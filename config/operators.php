<?php

return [
    'phone-codes' => [
        'mtn'     => ['0901', '0902', '0903', '0905', '0930', '0933', '0935', '0936', '0937', '0938', '0939'],
        'mci'     => ['0910', '0911', '0912', '0913', '0914', '0915', '0916', '0917', '0918', '0919', '0990', '0991'],
        'rightel' => ['0920', '0921', '0922'],

    ],

    'sso' => [
        'service-id' => 9,
        'baseurl'    => 'http://api.kavenegar.com/v1/713154586F4E422F422F756A3067556848444B4753445337584A536465516B55/sms/send.json',
        'timeout'    => 30.0,

        'url' => [
            'signup' => 'signup',
            'login'  => 'login',
        ]
    ],

    'wallet' => [
        'baseurl'      => 'https://api.teentaak.com:8000/wallet/',
        'callback-url' => 'gateway.callback',
        'timeout'      => 4.0,

        'url' => [
            'create-customer' => 'NewCustomer',
            'create-account'  => 'NewAccount',
            'get-balance'     => 'GetBalance',
            'bank-list'       => 'BankList',
            'cash-out'        => 'CashOut',
            'payment'         => 'ChargeInit',
            'callback'        => 'ChargeConfirm',
        ]
    ]

];
