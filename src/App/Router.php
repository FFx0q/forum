<?php 
    namespace App\Base;
    
    class Router
    {
        private $controller = "home";
        private $action = "index";
        private $param;

        public function __construct(Request $request)
        {
            $parts = explode('/', $request->getUrl());
            
            $this->controller = empty($parts[1]) ? "Home" : ucwords($parts[1]);
            $this->action = empty($parts[2]) ? "Index" : ucwords($parts[2]);
            $this->param = empty($parts[3]) ? 0 : $parts[3];
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getAction()
        {
            return $this->action;
        }
        
        public function getParam()
        {
            return $this->param;
        }
    }