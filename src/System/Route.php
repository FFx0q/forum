<?php
    namespace App\Base;

    class Route 
    {
        private $controller;
        private $method;
        private $pattern;

        public function __construct($controller, $method, $pattern)
        {
            $this->controller = $controller;
            $this->method = $method;
            $this->pattern = $pattern;
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getMethod()
        {
            return $this->method;
        }

        public function getPattern()
        {
            return $this->pattern;
        }

        public function isMatch(Request $request, &$argv)
        {
            $result = preg_match($this->pattern, $request->getUri(), $argv);
            unset($argv[0]);
            $argv = array_values($argv);
            return $result;
        }

    }
