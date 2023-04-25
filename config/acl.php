<?php

return [
    // exclude routes from authorization
    'exclude' => [
        'dashboard',
        'dashboard/admins/self',
        'dashboard/tags/json',
        'dashboard/uploader',
        'dashboard/merchant',
        'dashboard/agent'
    ],

    'sections' => [
        '1' => [
            'controller'  => 'SystemController',
            'id'          => 'system',
            'icon'        => 'agent',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.system.index',
            'count'       => null,

            'read'    => ['index'],
            'write'   => ['edit', 'create'],
            'update'  => ['store', 'update'],
            'delete'  => ['destroy'],
            'publish' => [],
        ],
        '2' => [
            'controller'  => 'AgentController',
            'id'          => 'system',
            'icon'        => 'agent',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.agent.index',
            'count'       => null,

            'read'    => ['index'],
            'write'   => ['edit', 'create'],
            'update'  => ['store', 'update'],
            'delete'  => ['destroy'],
            'publish' => [],
        ],
        '3' => [
            'controller'  => 'MerchantController',
            'id'          => 'system',
            'icon'        => 'agent',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.merchant.index',
            'count'       => null,

            'read'    => ['index'],
            'write'   => ['edit', 'create'],
            'update'  => ['store', 'update'],
            'delete'  => ['destroy'],
            'publish' => [],
        ],

        '5' => [
            'controller'  => 'RoleController',
            'id'          => 'role',
            'icon'        => 'agent',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.roles.index',
            'count'       => null,

            'read'    => ['index'],
            'write'   => ['edit', 'create'],
            'update'  => ['store', 'update'],
            'delete'  => ['destroy'],
            'publish' => [],
        ],

        '6' => [
            'controller'  => 'AdminController',
            'id'          => 'admin',
            'icon'        => 'agent',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.admin.index',
            'count'       => null,

            'read'    => ['index'],
            'write'   => ['edit', 'create'],
            'update'  => ['store', 'update'],
            'delete'  => ['destroy'],
            'publish' => [],
        ],

        '7' => [
            'controller'  => 'LoginAttemptController',
            'id'          => 'login-attempt',
            'icon'        => 'agent',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.login-attempt.index',
            'count'       => null,

            'read'    => ['index'],
            'write'   => ['edit', 'create'],
            'update'  => ['store', 'update'],
            'delete'  => ['destroy'],
            'publish' => [],
        ],

        '9' => [
            'controller'  => 'SettingController',
            'id'          => 'setting',
            'icon'        => 'section',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.setting.index',
            'count'       => null,

            'read'    => ['index','editMenu','subMenu'],
            'write'   => ['edit', 'create','editMenu'],
            'update'  => ['store', 'update','updateMenu','editMenu'],
            'delete'  => ['editMenu','dropMainMenu','dropSubMenuItem'],
            'publish' => [],
        ],
        '10' => [
            'controller'  => 'MenuController',
            'id'          => 'menu',
            'icon'        => 'section',
            'access'      => 'read',
            'has_publish' => false,
            'url'         => 'admin.menu.index',
            'count'       => null,

            'read'    => ['index','subMenu','editSubMenu'],
            'write'   => ['store','subMenu','editSubMenu'],
            'update'  => ['editSubMenu','update'],
            'delete'  => [],
            'publish' => [],
        ],


    ],

    'dynamic' => [
        'toggle' => []
    ]
];
