<?php
    namespace Application\Controller;

    use System\Controller\AbstractController;
use System\Http\Request;
use System\Http\Response;

class TestController extends AbstractController
    {
        public function handle(int $id = null, string $method)
        {
            switch($method) {
                case "GET": {
                    $response = new Response(200, json_encode(["Hello", "World"]));
                    $response->prepare()->send();
                    break;
                } default: {
                    echo "TestDef";
                }
            }
        }
    }