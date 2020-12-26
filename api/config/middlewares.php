<?php
    use Slim\App;
    use Society\Application\Middleware\NotFoundMiddleware;
    use Society\Application\Middleware\CorsMiddleware;

    return function (App $app) {
        $app->add(NotFoundMiddleware::class);
        $app->add(CorsMiddleware::class);
    };
