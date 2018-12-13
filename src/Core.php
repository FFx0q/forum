<?php
    namespace App;
    class Core 
    {
        private $rootDir;
        private $templateDir;
        private $cacheDir;

        public function __construct() 
        {
            $this->rootDir = $_SERVER['DOCUMENT_ROOT'];
            $this->templateDir = $this->rootDir.'/templates';
            $this->cacheDir = $this->rootDir.'/cache';
        }

        public function getRootDir()
        {
            return $this->rootDir;
        }

        public function getTemplateDir()
        {
            return $this->templateDir;
        }

        public function getCacheDir()
        {
            return $this->cacheDir;
        }
    }
