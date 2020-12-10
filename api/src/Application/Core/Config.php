<?php
    namespace Society\Application\Core;

    class Config
    {
        public static function get(string $key)
        {
            if (isset($_ENV[$key])) {
                return $_ENV[$key];
            }

            return null;
        }
    }