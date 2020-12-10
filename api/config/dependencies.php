<?php
    use DI\ContainerBuilder;
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;
    use Monolog\Processor\UidProcessor;
    use Psr\Container\ContainerInterface;
    use Psr\Log\LoggerInterface;

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
    };