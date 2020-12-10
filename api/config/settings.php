<?php

    use DI\ContainerBuilder;
    use Monolog\Logger;

    return function (ContainerBuilder $builder) {
        $builder->addDefinitions([
            'settings' => [
                'displayErrorDetails' => true,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ]
            ]
        ]);
    };