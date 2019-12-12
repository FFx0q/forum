<?php

    namespace App\Base;

    use PDO;

    class Database
    {
        protected $connection = null;

        public function __construct()
        {
            try {
                $dsn = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').';charset=utf8';
                $this->connection = new PDO($dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }

        public function getConnection()
        {
            return $this->connection;
        }
    }