<?php
    require_once(__DIR__.'/vendor/autoload.php');

    $app = new App\Core();

    //echo $app->getRootDir();
    $route = new App\Base\Route();
    $request = new App\Base\Request();

    echo $route->getController($request->getUrl());