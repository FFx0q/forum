<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');

    session_start();

    $request = new App\Base\Request();
    $router = new App\Base\Router($request);

    $c = "App\\Controller\\".$router->getController();
    $controller = new $c();
    
    $action = $router->getAction()."Action";
    $controller->$action();

