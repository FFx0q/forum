<?php
    namespace System\Route;

    use System\Http\Response;
    use System\Http\Request;
    use System\Route\RouteCollection;

    class Router
    {
        private $routes = [];
        private $allowedMethod = [
            'GET',
            'POST'
        ];

        public function __construct(array $collection)
        {
            $this->routes = $collection;
        }

        public function redirect(string $url)
        {
            header("Location: {$url}");
        }

        public function match(string $uri, string $method)
        {
            foreach ($this->routes as $route) {
                if (!in_array($method, $this->allowedMethod)) {
                    $response = new Response(405, Response::$statusTexts[405]);
                    $response->send();
                }

                $pattern = "|^{$route[1]}?$|";
                $pattern = str_replace("{id}", "([0-9]+)", $pattern);

                if (preg_match($pattern, $uri)) {
                    return $route;
                }
            }

            return false;
        }
    }
