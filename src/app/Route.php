<?php 
    namespace App\Base;
    class Route 
    {
        private $request;

        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public static function redirect($url)
        {
            header('Location:'.$url);
        }

        public function getController()
        {
            $controller = explode('/', ltrim($this->request->getUrl(), '/'));
            if(!empty($controller[0]))
                return ucwords($controller[0]).'Controller';
            else 
                return 'IndexController';
        }
        public function getAction()
        {
            $action = explode('/', ltrim($this->request->getUrl(), '/'));
            if(!empty($action[1]))
                return $action[1];
            else 
                return 'index';
        }
        public function getParam()
        {
            $param = explode('/', ltrim($this->request->getUrl(), '/'));
            if(!empty($param[2]))
                return $param[2];
            else 
                return 'null';
        }
    }