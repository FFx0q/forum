<?php
    namespace App;

    class Core
    {
        private $rootDir = null;

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

        public function getTemplateDir()
        {
            return $this->getRootDir().'/src/Views';
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
