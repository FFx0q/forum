<?php 
    namespace App\Base;
    
    class Router
    {
        private $controller = "home";
        private $action = "index";
        private $params;

        public function __construct(Request $request)
        {
            $parts = explode('/', $request->getUrl());

            if(count($parts))
            {
                if(isset($parts[1]))
                {
                    $this->controller = ucwords($parts[1]);

                    if(isset($parts[2]))
                    {
                        $this->action = ucwords($parts[2]);
                    }
                    $this->params = array_slice($parts, 3);
                }

            }
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getAction()
        {
            return $this->action;
        }
        
        public function getParams()
        {
            return $this->params;
        }
    }