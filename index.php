<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');

    session_start();
    
    $app = new App\Core();
    $b = new App\Base\Controller;
    $route = $b->containerBuild()->get('App\Base\Route');

    $c = ('\\App\\Controller\\'.$route->getController());
    $controller = new $c();
    $action = $route->getAction();
    echo $controller->$action();