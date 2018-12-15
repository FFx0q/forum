<?php
    require_once ("./vendor/autoload.php");
    $controller = new App\Base\Controller();
    return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($controller->getManager());

