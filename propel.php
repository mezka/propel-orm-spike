<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'bookstore' => [
                    'adapter'    => 'sqlite',
                    'classname'  => 'Propel\Runtime\Connection\DebugPDO',
                    'dsn'        => 'sqlite://home/mezka/propel-orm-spike/lazygram.db',
                    'user'       => 'root',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'bookstore',
            'connections' => ['bookstore']
        ],
        'generator' => [
            'defaultConnection' => 'bookstore',
            'connections' => ['bookstore']
        ]
    ]
];

