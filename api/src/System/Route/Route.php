<?php
namespace System\Route;

use System\Http\Response;

class Route
{
    private $pattern;
    private $callback;

    public function __construct(string $pattern, string $callback)
    {
        $this->pattern = $pattern;
        $this->callback = $callback;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getCallback()
    {
        return $this->callback;
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
        $parts = explode('#', $this->getCallback());
        $param = null;
        $controller = "Application\\Controller\\{$parts[0]}";
        
        if (!class_exists($controller)) {
            $response = new Response(404, Response::$statusTexts[404]);
            $response->prepare()->send();
        }
        $uriParts = explode('/', $uri);
        if (!empty($uriParts[2])) {
            $param = $uriParts[2];
        }
            
        call_user_func_array([new $controller, $parts[1]], [(int)$param]);
    }
}
