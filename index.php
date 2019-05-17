<?php
    require_once(__DIR__.'/vendor/autoload.php');
    session_start();

    $request = new App\Base\Request();
    $router = new App\Base\Router($request);

    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();

    $c = "App\\Controller\\".$router->getController()."Controller";
    $controller = new $c();
    
    $action = $router->getAction()."Action";
    $controller->$action();

