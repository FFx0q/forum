<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');
    
    session_start();

    $controller = new App\Controller\UserController();

    if($controller->userExists($_POST['loginName'], $_POST['loginPass']) == TRUE)
    {
        $controller->logged($_POST['loginName']);
    }
    else 
    {
        \App\Base\Router::redirect('user/login');
    }
