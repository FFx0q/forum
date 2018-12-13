<?php
    require_once(__DIR__.'/vendor/autoload.php');

    $app = new App\Core();
    //echo $app->getRootDir();
    $route = new App\Base\Route();
    $request = new App\Base\Request();

    $c = ('\\App\\Controller\\'.$route->getController($request->getUrl()));
    $controller = new $c();
    $action = $route->getAction($request->getUrl());
    echo $controller->$action();