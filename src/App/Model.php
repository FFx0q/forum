<?php
    namespace App\Base;

    use PDO;
    use App\Core;

    class Model
    {
        public static function getInstance()
        {
            $db = null;

            if($db == null)
            {
                $con = 'mysql:host='.Config::get('database/dbhost').';dbname='.Config::get('database/dbname').';charset=utf8';
                $db = new PDO($con, Config::get('database/dbuser'), Config::get('database/dbpass'));
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            return $db;
        }
    }