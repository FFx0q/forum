<?php
    namespace App\Base;

    class Router
    {
        public static function redirect($url)
        {
            header("Location: ".$url);
        }
    }
