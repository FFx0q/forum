<?php
namespace System\Route;

use System\Http\Response;

class Route
{
    private $pattern;

    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    public function getPattern()
    {
        return $this->pattern;
    }
    public function getMethods()
    {
        return [
                "POST",
                "GET"
            ];
    }
    public function dispatch(string $uri, string $method)
    {
        $parts = explode('/', $uri);
        $controller = "Application\\Controller\\".ucwords($parts[1])."Controller";
        $param = null;

        if ($uri === "/") {
            $controller = "Application\\Controller\\IndexController";
        }

        if (!class_exists($controller)) {
            $response = new Response(404, Response::$statusTexts[404]);
            $response->prepare()->send();
        }

        if (!empty($parts[2])) {
            $param = $parts[2];
        }
            
        $worker = new $controller;
        call_user_func_array([$worker, "handle"], [$method, $param]);
    }
}
