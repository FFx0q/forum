<?php

    namespace App\Base;

    class Http
    {
        public static function isGet()
        {
            return $_SERVER["REQUEST_METHOD"] == "GET";
        }

        public static function isPost()
        {
            return $_SERVER["REQUEST_METHOD"] == "POST";
        }
    }