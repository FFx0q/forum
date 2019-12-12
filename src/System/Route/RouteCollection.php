<?php
    namespace System\Route;

    class RouteCollection extends \SplObjectStorage
    {
        public function attachRoute($object)
        {
            parent::attach($object, null);
        }
        public function all()
        {
            $routes = [];
            foreach ($this as $route) {
                $routes[] = $route;
            }
            return $routes;
        }
    }