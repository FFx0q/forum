<?php
    namespace System\Controller;

    use System\Controller\ControllerInterface;
    use System\Http\Response;

    abstract class AbstractController implements ControllerInterface
    {
        public function invalidMethod()
        {
            return new Response(403, Response::$statusTexts[403]);
        }

        public function notFound()
        {
            return new Response(404, Response::$statusTexts[404]);
        }
    }
