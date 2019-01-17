<?php
    require_once(__DIR__.'/vendor/autoload.php');
    session_start();
    $app = new App\Core();
    $request = new App\Base\Request();
    $route = new App\Base\Route($request);

    $c = ('\\App\\Controller\\'.$route->getController());
    $controller = new $c();
    $action = $route->getAction();
    echo $controller->$action();