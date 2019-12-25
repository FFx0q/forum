<?php
namespace System\Route;

use System\Application;
use System\Route\{RouteCollection, Router};
use System\Http\Response;

class Route
{
    public static function __callStatic($name, $arguments)
    {
        $httpMethod = strtoupper($arguments[1]);
        $uri = $arguments[0];

        return self::dispatch($httpMethod, $uri);
    }

    public static function dispatch(string $method, string $uri)
    {
        $collection = require_once Application::getConfigDir()."routes.php";
        $router = new Router($collection);

        $match = $router->match($uri, $method);

        $parts = explode('/', $uri);
        $controller = "Application\\Controller\\".ucwords($parts[1])."Controller";
        
        if (!class_exists($controller)) {
            return new Response(404, Response::$statusTexts[404]);
        }
        
        $param = null;
        if (isset($parts[2])) {
            $param = $parts[2];
        }

        $response = call_user_func_array([new $controller, $match[2]], [(int)$param]);

        return $response;
    }
}
