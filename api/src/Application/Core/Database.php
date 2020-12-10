<?php
    namespace Society\Application\Core;

    use PDO;
    use PDOException;

    class Database
    {
        private static ?Database $factory = null;
        private ?PDO $database = null;

        public static function getFactory (): Database {
            if (!self::$factory) {
                self::$factory = new Database();
            }
            return self::$factory;
        }

        public function getConnection(): PDO
        {
            if (!$this->database) {
                try {
                    $dsn = Config::get('DB_TYPE').":dbname=".Config::get('DB_NAME').";host=".Config::get('DB_HOST');
                    $this->database = new PDO($dsn.';charset=utf8',
                        Config::get('DB_USER'),
                        Config::get('DB_PASS')
                    );
                    $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo 'Error code: ' . $e->getCode();
                    echo 'Error Message: ' . $e->getMessage();
                    exit;
                }
            }

            return $this->database;
        }
    }