<?php
    namespace System\Database;

    use PDO;
    use PDOException;

    class Database
    {
        private $database;

        public function getConnection()
        {
            if (!$this->database) {
                try {
                    $this->database = new PDO(
                        getenv('DB_TYPE').';host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').
                        ';charset=utf-8',
                        getenv('DB_USER'),
                        getenv('DB_PASS')
                    );
                    $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo 'Database connection can not be estabilished. Please try again later.' . '<br>';
                    echo 'Error code: ' . $e->getCode();

                    exit;
                }
            }
            return $this->database;
        }
    }
