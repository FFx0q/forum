<?php
    use DI\ContainerBuilder;
    use Psr\Container\ContainerInterface;
    use Psr\Log\LoggerInterface;
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;
    use Monolog\Processor\UidProcessor;

    return function (ContainerBuilder $builder) {
        $builder->addDefinitions([
            LoggerInterface::class => function (ContainerInterface $c) {
                $settings = $c->get('settings')['logger'];
                $logger = new Logger($settings['name']);

                $processor = new UidProcessor();
                $logger->pushProcessor($processor);
    
                $handler = new StreamHandler($settings['path'], $settings['level']);
                $logger->pushHandler($handler);
    
                return $logger;
            }
        ]);

        $builder->addDefinitions([
            PDO::class => function (ContainerInterface $c) {
                $db = $c->get('settings')['db'];
                $dsn = sprintf(
                    '%s:host=%s;dbname=%s;charset=utf8',
                    $db['type'],
                    $db['host'],
                    $db['name']
                );
                $pdo = new PDO($dsn, $db['user'], $db['pass']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                return $pdo;
            }
        ]);
    };