<?php
    namespace System;

    use Dotenv\Dotenv;
    use System\Http\Request;
    use System\Http\Response;
    use System\Route\Route;

    class Application
    {
        private static $instance = null;
        private $rootDir = null;
        private $booted = false;

        private function __construct() {}
        private function __clone() {}

        public function getKernel()
        {
            if (self::$instance === null) {
                self::$instance = new Application();
            }

            return self::$instance;
        }
        public function boot()
        {
            if ($this->booted === false) {
                $this->booted = true;

                $dotenv = Dotenv::create($this->getConfigDir());
                $dotenv->load();
            }   
        }

        public function handle(Request $request)
        {
            $response = Route::any($request->get('REQUEST_URI'), $request->get('REQUEST_METHOD'));
        
            return $response;
        }

        public static function getRootDir()
        {
            return dirname(dirname(__DIR__));
        }

        public static function getConfigDir()
        {
            return self::getRootDir()."/config/";
        }
    }
