<?php
    require_once(__DIR__.'/vendor/autoload.php');
    session_start();

    $controller = new App\Controller\UserController();

    if($controller->userExists($_POST['loginName'], $_POST['loginPass']) == TRUE)
    {
        $controller->logged($_POST['loginName']);
    }
    else 
    {
        \App\Base\Route::redirect('user/login');
    }
