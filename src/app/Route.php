<?php 
    namespace App\Base;
    class Route 
    {
        public function getController($url)
        {
            $controller = explode('/', ltrim($url, '/'));
            if(!empty($controller[0]))
                return ucwords($controller[0]).'Controller';
            else 
                return 'IndexController';
        }
        public function getAction($url)
        {
            $action = explode('/', ltrim($url, '/'));
            if(!empty($action[0]))
                return $action[0];
            else 
                return 'index';
        }
    }