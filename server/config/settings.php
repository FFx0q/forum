<?php

    use DI\ContainerBuilder;
    use Monolog\Logger;

    return function (ContainerBuilder $builder) {
        $builder->addDefinitions([
            'settings' => [
                'logger' => [
                    'name' => 'society',
                    'path' => __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],
                'db' => [
                    'type' => 'mysql',
                    'host' => '127.0.0.1',
                    'user' => 'root',
                    'pass' => 'bP75meku',
                    'name' => 'society',
                ]
            ]
        ]);
    };
