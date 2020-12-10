<?php
    require_once (__DIR__.'/../vendor/autoload.php');

    $app = new Society\Application\Core\Application();
    $app->handle();
