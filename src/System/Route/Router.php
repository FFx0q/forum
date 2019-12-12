<?php
    namespace System\Route;

    use System\Http\Response;
    use System\Http\Request;
    use System\Route\RouteCollection;

    class Router
    {
        private $routes = [];

        public function __construct(RouteCollection $collection)
        {
            $this->routes = $collection;
        }

        public function matchCurrentRequest(Request $request)
        {
            if (!$this->match($request->requestUri, $request->requestMethod)) {
                $response = new Response(404, Response::$statusTexts[404]);
                $response->prepare()->send();
            }
        }

        public function redirect(string $url)
        {
            header("Location: {$url}");
        }

        private function match(string $uri, string $method)
        {
            foreach ($this->routes->all() as $routes) {
                if (!in_array($method, $routes->getMethods())) {
                    $response = new Response(405, Response::$statusTexts[405]);
                    $response->prepare()->send();
                }
                $pattern = "|^{$routes->getPattern()}?$|";
                if (preg_match($pattern, $uri)) {
                    $routes->dispatch($uri, $method);
                    return true;
                }
            }
            return false;
        }
    }