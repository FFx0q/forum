<?php
    namespace System\Controller;

    use System\Controller\ControllerInterface;
    use System\Database\Database;

    abstract class AbstractController implements ControllerInterface
    {
        protected $connection;
        
        abstract public function handle(string $method, int $id);
        
        public function __construct()
        {
            $this->connection = Database::create();
        }

        public function invalidMethod()
        {
        }

        public function getDatabase()
        {
            return $this->connection;
        }

        public function __destruct()
        {
            $this->connection->close();
        }
    }
