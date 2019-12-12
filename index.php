<?php
    require_once(__DIR__.'/vendor/autoload.php');

    $routes = require ('config/routes.php');
    $request = new System\Http\Request;


    $router = new System\Route\Router($routes);
    $router->matchCurrentRequest($request);

    