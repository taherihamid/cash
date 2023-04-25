<?php

return [
    'api' => [
        'standard' => [
            // Auth
            'v1.auth.login' => [
                'method'     => 'post',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.user.agent' => [
                'method'     => 'get',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.user.change-phone' => [
                'method'     => 'post',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.user.verify-phone' => [
                'method'     => 'post',
                'parameters' => [],
                'check'     =>[]
            ],

            // settings
            'v1.settings.general' => [
                'method'     => 'query',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.card.create'       => [
                'method'     => 'post',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.card.index'       => [
                'method'     => 'get',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.card.confirm'       => [
                'method'     => 'post',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.card.inquiry'       => [
                'method'     => 'query',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.card.retrieve'       => [
                'method'     => 'query',
                'parameters' => [],
                'check'     =>[]
            ],


            'v1.form.detail'       => [
                'method'     => 'query',
                'parameters' => [],
                'check'     =>[]
            ],

            'v1.course.add'     =>[
                'method'     =>'post',
                'parameters' =>[],
                'check'     =>['university_user_id']
            ],

            'v1.course.review'     =>[
                'method'     =>'qurey',
                'parameters' =>[],
                'check'     =>['university_user_id']
            ],

            'v1.course.confirm'     =>[
                'method'     =>'post',
                'parameters' =>[],
                'check'     =>['university_user_id']
            ],

            // notifications
            'v1.notifications.send-token' => [
                'method'     => 'post',
                'parameters' => ['type'],
            ],

            //university user
            'v1.user.create'=>[
                'method'        =>'post',
                'parameters'    =>[],
                'check'     =>['university_user_id']
            ],
            'v1.user.upload-image'=>[
                'method'        => 'post',
                'parameters'    => [],
                'check'         => ['university_user_id']
            ],

            //Course
            'v1.course.search'=>[
                'method'        =>'post',
                'parameters'    =>[],
            ],

            'v1.reserve.auth'=>[
                'method'    =>'post',
                'parameters'    =>[],
            ],

            'v1.food.date-list'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.food.meal-list' => [
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.food.order.payment'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],
            'v1.food.order.create'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],
            'v1.food.order.inquiry'=>[
                'method'    =>'get',
                'parameters'    =>[],
                'check' =>[]
            ],

            // Parking
            'v1.parking.universities-list'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' => ['identification_number', 'identification_type']
            ],
            'v1.parking.list'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],
            'v1.parking.order.create'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.parking.order.inquiry'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],
            'v1.parking.in-parking'=>[
                'method'    =>'get',
                'parameters'    =>[],
                'check' => []
            ],
            //professor lessons list
            'v1.professor.lessons-list'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],
            'v1.professor.lesson-detail'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.professor.presence'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.professor.create-survey'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            //student lesson list
            'v1.student.presence'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.student.lessons-list'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],
            'v1.student.lesson-detail'=>[
                'method'    =>'query',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.student.response-survey'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            //event

            'v1.event.response'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            'v1.event.comment'=>[
                'method'    =>'post',
                'parameters'    =>[],
                'check' =>['identification_number', 'identification_type']
            ],

            //message

            'v1.message.add' => [
                'method' =>'post',
                'parameters' =>[],
                'check'     =>[]
            ],

            'v1.message.list' => [
                'method' =>'query',
                'parameters' =>[],
                'check' =>[],
            ]

        ],

        'custom' => [
            'v1.sso.check-operator' => [
                'parameters' => ['phone|post'],
                'hash'       => 'hash|post',
            ],

            'v1.sso.verify' => [
                'parameters' => [
                    'code|post',
                    'phone|post'
                ],
                'hash'       => 'hash|post',
            ],
        ]
    ]
];
