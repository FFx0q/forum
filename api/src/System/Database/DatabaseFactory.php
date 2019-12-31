<?php
namespace System\Database;

class DatabaseFactory
{
    private static $factory;
    
    public static function getFactory()
    {
        if (!self::$factory) {
            self::$factory = new Database();
        }

        return self::$factory;
    }
}
