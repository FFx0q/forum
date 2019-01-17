<?php
    namespace App;
    class Core 
    {
        private $rootDir;

        public function __construct() 
        {
            $this->rootDir = $_SERVER['DOCUMENT_ROOT'];
        }

        public function getRootDir()
        {
            return $this->rootDir;
        }

        public function getTemplateDir()
        {
            return $this->getRootDir().'/templates';
        }

        public function getCacheDir()
        {
            return $this->getRootDir().'/cache';
        }

        public function getConfigDir()
        {
            return $this->getRootDir().'/config';
        }
    }
