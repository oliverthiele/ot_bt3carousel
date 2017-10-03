<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'ot_bt3carousel',
    'description' => 'Bootstrap3 Carousel',
    'category' => 'frontend',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'author' => 'Oliver Thiele',
    'author_company' => 'Web Development Oliver Thiele',
    'author_email' => 'mailYYYY@oliver-thiele.de',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.9.99'
        ],
        'conflicts' => [],
        'suggests' => [
            'ot_bootstrap3' => '8.7.0-8.9.99', // My Basis theme...
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'OliverThiele\\OtBt3carousel\\' => 'Classes'
        ]
    ]
];
