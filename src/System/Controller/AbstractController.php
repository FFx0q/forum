<?php
    namespace System\Controller;

    use System\Controller\ControllerInterface;
    use System\Database\Database;

    abstract class AbstractController implements ControllerInterface
    {
        abstract public function handle(string $method, int $id);

        public function invalidMethod()
        {
        }

        public function getDatabase()
        {
            return Database::create()->getConnection();
        }
    }
