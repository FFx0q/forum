<?php 
    namespace App\Base;
    class Route 
    {
        public static function redirect($url)
        {
            header('Location:'.$url);
        }

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
            if(!empty($action[1]))
                return $action[1];
            else 
                return 'index';
        }
    }