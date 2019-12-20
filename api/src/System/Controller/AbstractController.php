<?php
    namespace System\Controller;

    use System\Controller\ControllerInterface;
    use System\Database\Database;
    use System\Http\Response;

abstract class AbstractController implements ControllerInterface
    {
        protected $connection;
        
        abstract public function handle(string $method, int $id);
        
        public function __construct()
        {
            $this->connection = new Database;
        }

        public function invalidMethod()
        {
            $response = new Response(403, Response::$statusTexts[403]);
            $response->send();
        }

        public function notFound()
        {
            $response = new Response(404, Response::$statusTexts[404]);
            $response->send();
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
