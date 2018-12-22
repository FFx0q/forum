<?php
    require_once(__DIR__.'/vendor/autoload.php');
    session_start();

    $user = new App\Entity\User();
    $controller = new App\Base\Controller();
    $em = $controller->getManager();

    $username = $_POST['loginName'];
    $pass = $_POST['loginPass'];

    $query = $em->createQuery('SELECT u.name, u.password FROM App\Entity\User as u WHERE u.name=:username');
    $query->setParameters([
        'username'     => $username
    ]);
    $login = $query->getResult();
    $hash = $login[0];

    if(password_verify($pass, $hash['password'])) {
        $_SESSION['login'] = $username;
        App\Base\Route::redirect("index/index");
    } else 
    {
        App\Base\Route::redirect("user/login");
    }
