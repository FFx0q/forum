<?php
    namespace App\Base;

    use App\Core;

    class Config extends Core
    {
        public static function get($path = null)
        {
            if($path)
            {
                $config = $GLOBALS['config'];
                $path = explode('/', $path);
                
                foreach ($path as $key) 
                {
                    if(isset($config[$key]))
                        $config = $config[$key];
                    
                }
                return $config;
            }
        }
    }