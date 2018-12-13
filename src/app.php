<?php
    class App 
    {
        public $rootDir;

        public function getRootDir()
        {
            return $this->rootDir = $_SERVER['DOCUMENT_ROOT'];
        }
    }
