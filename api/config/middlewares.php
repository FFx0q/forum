<?php
    use Slim\App;
    use Society\Application\Middleware\{NotFoundMiddleware, CorsMiddleware};

    return function (App $app) {
        $app->add(NotFoundMiddleware::class);
        $app->add(CorsMiddleware::class);
    };