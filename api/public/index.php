<?php
    require_once(__DIR__.'/../vendor/autoload.php');
    require_once(__DIR__.'/../config/bootstrap.php');

    use Slim\Factory\ServerRequestCreatorFactory;
    use Society\Application\ResponseEmitter\ResponseEmitter;

    $requestCreator = ServerRequestCreatorFactory::create();
    $request = $requestCreator->createServerRequestFromGlobals();

    $response = $app->handle($request);
    $emitter = new ResponseEmitter();
    $emitter->emit($response);
