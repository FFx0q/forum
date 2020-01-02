<?php
    namespace System;

    use Exception;
    use Dotenv\Dotenv;
    use System\Http\Response;
    use System\Http\Request;
    use System\Route\Router;

    class Application
    {
        private static $instance = null;  

        private $booted = false;

        private function __construct()
        {
        }
        private function __clone()
        {
        }

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

        public function shutdown()
        {
            if ($this->booted === false) {
                return;
            }

            $this->booted = false;
        }

        public function handle(Request $request)
        {
            $collection = require self::getConfigDir()."routes.php";
            
            $router = new Router($collection, $request);
            $response = $router->handle();

            if (!$response instanceof Response) {
                $msg = "The controller must return a Response object";

                if ($response === null) {
                    $msg .= "\nDid you forget to add a return statement?";
                }

                throw new Exception($msg);
            }

            return $response;
        }

        public function error(string $msg)
        {
            $response = new Response(500, $msg);
            $response->send();
            
            $this->shutdown();
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
