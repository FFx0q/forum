<?php
    namespace Society\Application\Middleware;

    use Firebase\JWT\JWT;
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Server\MiddlewareInterface;
    use Psr\Http\Server\RequestHandlerInterface as Handler;

    class AuthMiddleware implements MiddlewareInterface
    {
        public function process(Request $request, Handler $handler): Response
        {
            $response = (new \Slim\Psr7\Response)->withStatus(404);
            try {
                $this->getUserToken($request);
            } catch (\UnexpectedValueException $e) {
                return $response->withStatus(400);
            }
            
            return $handler->handle($request);
        }

        private function getUserToken(Request $request): string
        {
            if (!$request->hasHeader('Authorization')) {
                throw new \UnexpectedValueException('Token not provided');
            }

            $authHeader = $request->getHeader('authorization');
            list($jwt) = sscanf($authHeader[0], 'Bearer %s');

            if (!$jwt) {
                throw new \UnexpectedValueException('Token not provided');
            }

            return $jwt;
        }
    }
