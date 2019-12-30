<?php
    namespace System\Route;

    use System\Http\Response;
    use System\Http\Request;
    use System\Route\RouteCollection;

    class Router
    {
        private $routes = [];
        private $request;
        private $namespace = '\\Application\\Controller\\';

        public function __construct(RouteCollection $collection, Request $request)
        {
            $this->routes = $collection;
            $this->request = $request;
        }

        public function redirect(string $url)
        {
            header("Location: {$url}");
        }

        public function handle()
        {
            $uri = $this->request->get('REQUEST_URI');
            $route = $this->match($uri);

            if ($route === false) {
                $this->notFound();

                return;
            }
        
            return $this->dispatch($uri, $route);            
        }

        private function dispatch(string $uri, array $params)
        {
            list($controller, $method) = explode('#', $params['callback']);
            $controller = $this->namespace . $controller;

            $parts = explode('/', $uri);
            $param = $parts[2] ?? null;

            if (class_exists($controller)) {
                return call_user_func_array([new $controller, $method], [$param]);
            }
        }

        private function match(string $uri)
        {
            foreach ($this->routes->all() as $route => $param) {
               
                $pattern = "|^{$route}?$|";
                $pattern = str_replace("{id}", "([0-9]+)", $pattern);

                if (preg_match($pattern, $uri)) {
                    return $param;
                }
            }

            return false;
        }

        private function notFound()
        {
            $response = new Response(404, Response::$statusTexts[404]);
            $response->send();
            
            return;
        }
    }
