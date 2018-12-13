<?php
    namespace App;
    class Core 
    {
        private $rootDir;
        private $templateDir;

        public function __construct() 
        {
            $this->rootDir = $_SERVER['DOCUMENT_ROOT'];
            $this->templateDir = $this->rootDir.'/templates';
        }

        public function getRootDir()
        {
            return $this->rootDir;
        }

        public function getTemplateDir()
        {
            return $this->templateDir;
        }
    }
