<?php
    namespace System\Database;

    use PDO;
    use PDOException;
    use System\Database\DatabaseInterface;

    class Database implements DatabaseInterface
    {
        private $database;

        public function getConnection() : PDO
        {
            if (!$this->database) {
                try {
                    $this->database = new PDO(
                        getenv('DB_TYPE').':host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').
                        ';charset=utf8',
                        getenv('DB_USER'),
                        getenv('DB_PASS')
                    );
                    $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    
                } catch (PDOException $e) {
                    echo 'Database connection can not be estabilished. Please try again later.' . '<br>';
                    echo $e->getMessage();

                    exit;
                }
            }
            return $this->database;
        }

        public function close() : void
        {
            $this->database = null;
        }
    }
