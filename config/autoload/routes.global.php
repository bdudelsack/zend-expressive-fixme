<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [
            App\Action\IndexAction::class => App\Action\IndexActionFactory::class,
            App\Action\JsonAction::class => App\Action\JsonActionFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\IndexAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'json',
            'path' => '/json/',
            'middleware' => App\Action\JsonAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
