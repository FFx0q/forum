<?php
    namespace Society\Application\Actions;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    abstract class Action
    {
        protected Request $request;
        protected Response $response;
        protected array $args;
        private ContainerInterface $container;
    
        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
        }

        public function __invoke(Request $request, Response $response, $args): Response
        {
            $this->request = $request;
            $this->response = $response;
            $this->args = $args;

            return $this->action();
        }

        abstract protected function action(): Response;

        protected function getRepository(string $class)
        {
            return $this->container->get($class);
        }
        
        protected function getFormData()
        {
            $input = json_decode(file_get_contents('php://input'));

            if (json_last_error() !== JSON_ERROR_NONE) {
            }

            return $input;
        }

        protected function resolveArg(string $name)
        {
            if (!isset($this->args[$name])) {
            }
    
            return $this->args[$name];
        }

        protected function respondWithData($data = null, int $statusCode = 200): Response
        {
            $payload = new ActionPayload($statusCode, $data);
    
            return $this->respond($payload);
        }
        
        protected function respond(ActionPayload $payload): Response
        {
            $json = json_encode($payload, JSON_PRETTY_PRINT);
            $this->response->getBody()->write($json);
    
            return $this->response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus($payload->getStatusCode());
        }
    }
