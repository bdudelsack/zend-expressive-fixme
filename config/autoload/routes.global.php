<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [
            App\Action\IndexAction::class => App\Action\IndexActionFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\IndexAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ]
    ],
];
