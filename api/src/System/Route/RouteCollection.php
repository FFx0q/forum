<?php
    namespace System\Route;

    use System\Http\Response;

    class RouteCollection
    {
        private $routes = [];
        private $allowedMethods = [
            'GET',
            'POST',
            'PUT',
            'PATCH',
            'DELETE'
        ];

        private $baseRoute = '';

        public function __call($method, $params)
        {
            $method = strtoupper($method);

            if (!in_array($method, $this->allowedMethods))  {
                $response = new Response(405, Response::$statusTexts[405]);
                $response->send();
            }

            $this->add($method, $params[0], $params[1]);
        }

        public function group(string $baseRoute, $callback) 
        {
            $this->baseRoute .= $baseRoute;
            
            call_user_func($callback);

            // Clear base route
            $this->baseRoute = '';
        }

        public function add(string $method, string $pattern, string $callback)
        {
            $pattern = $this->baseRoute.'/'.trim($pattern, '/');
            $pattern = $this->baseRoute ? rtrim($pattern, '/') : $pattern;

            $this->routes[$pattern] = [
                'method' => $method,
                'callback' => $callback
            ];
        }

        public function all()
        {
            return $this->routes;
        }
    }