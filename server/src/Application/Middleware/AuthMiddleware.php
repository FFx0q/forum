<?php
    namespace Society\Application\Middleware;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Server\MiddlewareInterface;
    use Psr\Http\Server\RequestHandlerInterface as Handler;
    use Slim\Exception\HttpUnauthorizedException;

    class AuthMiddleware implements MiddlewareInterface
    {
        public function process(Request $request, Handler $handler): Response
        {
            try {
                $this->getUserToken($request);
            } catch (\UnexpectedValueException $e) {
                throw new HttpUnauthorizedException($request);
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
