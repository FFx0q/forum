<?php 
    namespace App;
    class Route 
    {
        public function getController($url)
        {
            return ucwords(explode('/', ltrim($url, '/'))[0]).'Controller';
        }
    }