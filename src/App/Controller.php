<?php
    namespace App\Base;

    use App\Base\Router;
    use App\Base\Request;

    class Controller
    {
        private $route;

        public function __contructor()
        {
            
        }

        public function getRouter()
        {
            return $this->route = new Router(new Request());
        }
    }