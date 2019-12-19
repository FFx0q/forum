<?php
    namespace System;

    use Dotenv\Dotenv;

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

        public function getRootDir()
        {
            if ($this->rootDir === null) {
                $reflection = new \ReflectionObject($this);
                $dir = dirname($reflection->getFileName());
                while (!file_exists($dir.'/composer.json')) {
                    if ($dir === dirname($dir)) {
                        return $this->rootDir = $dir;
                    }
                    $dir = dirname($dir);
                }
                $this->rootDir = $dir;
            }
            return $this->rootDir;
        }

        public function getConfigDir()
        {
            return $this->getRootDir().'/config';
        }
    }
