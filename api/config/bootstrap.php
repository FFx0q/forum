<?php
    use DI\ContainerBuilder;
    use Slim\Factory\AppFactory;
    use Society\Application\Middleware\ErrorMiddleware;

    $containerBuilder = new ContainerBuilder();

    $settings = require_once(__DIR__.'/settings.php');
    $settings($containerBuilder);

    $dependencies = require_once(__DIR__.'/dependencies.php');
    $dependencies($containerBuilder);

    $repositories = require_once(__DIR__.'/repositories.php');
    $repositories($containerBuilder);

    $container = $containerBuilder->build();

    AppFactory::setContainer($container);
    $app = AppFactory::create();
    $callableResolver = $app->getCallableResolver();

    $app->addBodyParsingMiddleware();
    $middlewares = require_once (__DIR__.'/middlewares.php');
    $middlewares($app);

    $app->addRoutingMiddleware();
    $routes = require_once (__DIR__.'/routes.php');
    $routes($app);

    $responseFactory = $app->getResponseFactory();
    $errorHandler = new ErrorMiddleware($callableResolver, $responseFactory);

    $errorMiddleware = $app->addErrorMiddleware(true, true, true);
    $errorMiddleware->setDefaultErrorHandler($errorHandler);