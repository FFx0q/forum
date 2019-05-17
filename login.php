<?php
    require_once(__DIR__.'/vendor/autoload.php');
    
    session_start();

    $controller = new App\Controller\UserController();
    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
    if($controller->userExists($_POST['loginName'], $_POST['loginPass']) == TRUE)
    {
        $controller->logged($_POST['loginName']);
    }
    else 
    {
        \App\Base\Router::redirect('user/login');
    }
