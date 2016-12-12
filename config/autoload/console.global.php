<?php

return [
    'dependencies' => [
        'invokables' => [

        ],

        'factories' => [
            \App\Console\Command\InitCommand::class => \App\Console\Command\InitCommandFactory::class
        ],
    ],

    'console' => [
        'commands' => [
            \App\Console\Command\InitCommand::class
        ],
    ],
];