<?php
namespace System\Database;

class Database
{
    private $connection = null;

    public function __construct()
    {
        try {
            $dsn = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').';charset=utf8';
            $this->connection = new \PDO($dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function create()
    {
        return new Database;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function close()
    {
        $this->connection = null;
    }
}
