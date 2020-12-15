<?php
    namespace Society\Application\Actions;

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    final class PreflightAction
    {
        public function __invoke(Request $request, Response $response): Response
        {
            return $response;
        }
    }
