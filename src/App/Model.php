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
                $con = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').';charset=utf8';
                $db = new PDO($con, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            
            return $db;
        }
    }