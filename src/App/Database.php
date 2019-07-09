<?php

    namespace App\Base;

    use PDO;

    class Database
    {
        protected $_connection = null;
        private static $instance = null;


        private function __construct()
        {
            $pdo = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').';charset=utf8';
            $this->_connection = new PDO($pdo, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        private function __clone() { }

        public static function getInstance()
        {
            if (self::$instance == null) {
                self::$instance = new Database;
            }

            return self::$instance;
        }

        public function getConnection()
        {
            return $this->_connection;
        }
    }