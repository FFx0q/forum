<?php

    use App\Core;
    require_once(__DIR__.'/vendor/autoload.php');

    App\Base\Session::init();
    $core = new Core();

    $dotenv = Dotenv\Dotenv::create($core->getConfigDir());
    $dotenv->load();

    $routes = require ($core->getConfigDir().'/routes.php');
    $args = $foundRoute = null;
    $request = new App\Base\Request;

    foreach ($routes as $route) {
        if ($route->isMatch($request, $args)) {
            $foundRoute = $route;
            break;
        }
    }

    $class = 'App\\Controller\\' . $foundRoute->getController() . 'Controller';
    $worker = new $class;

    $method = $foundRoute->getMethod();
    call_user_func_array([$worker, $method], $args);
    