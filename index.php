<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');

    use App\Base\Route;

    session_start();
    $app = new App\Core();
    //$route = new Route();

    $c = ('\\App\\Controller\\Home');
    $controller = new $c();
    $action = "IndexAction";
    echo $controller->$action();