<?php
    namespace System\Controller;

    use System\Controller\ControllerInterface;
    use System\Http\Response;

    abstract class AbstractController implements ControllerInterface
    {
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
    }
