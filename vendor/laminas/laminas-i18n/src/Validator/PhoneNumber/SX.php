<?php

return [
    'code' => '1',
    'patterns' => [
        'national' => [
            'general' => '/^[5789]\\d{9}$/',
            'fixed' => '/^7215(?:4[2-8]|8[239]|9[056])\\d{4}$/',
            'mobile' => '/^7215(?:1[02]|2\\d|5[034679]|8[014-8])\\d{4}$/',
            'tollfree' => '/^8(?:00|55|66|77|88)[2-9]\\d{6}$/',
            'premium' => '/^900[2-9]\\d{6}$/',
            'personal' => '/^5(?:00|33|44)[2-9]\\d{6}$/',
            'emergency' => '/^919$/',
        ],
        'possible' => [
            'general' => '/^\\d{7}(?:\\d{3})?$/',
            'mobile' => '/^\\d{10}$/',
            'tollfree' => '/^\\d{10}$/',
            'premium' => '/^\\d{10}$/',
            'personal' => '/^\\d{10}$/',
            'emergency' => '/^\\d{3}$/',
        ],
    ],
];
