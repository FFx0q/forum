<?php
    require_once(__DIR__.'/vendor/autoload.php');

    $app = System\Application::getKernel();
    $app->boot();

    $routes = require('config/routes.php');
    $request = new System\Http\Request;

    $router = new System\Route\Router($routes);
    $router->matchCurrentRequest($request);
