<?php
    namespace Society\Application\Middleware;

    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Message\ServerRequestInterface;
    use Psr\Http\Server\MiddlewareInterface;
    use Psr\Http\Server\RequestHandlerInterface;
    use Slim\Exception\HttpNotFoundException;

    class NotFoundMiddleware implements MiddlewareInterface
    {
        public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
        {
            try {
                return $handler->handle($request);
            } catch (HttpNotFoundException $e) {
                throw $e;
            }
        }
    }
