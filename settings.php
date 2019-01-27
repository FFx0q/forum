<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');
    
    session_start();
    $controller = new App\Base\Controller;
    $em = $controller->getManager();
    $id = isset($_GET['uid']) ? $_GET['uid'] : " ";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['email']))
        {
            $em->createQueryBuilder()
                ->update('App\Entity\User', 'u')
                ->set('u.email', '?1')
                ->where('u.id = ?2')
                ->setParameter(1, $_POST['email'])
                ->setParameter(2, $id)
                ->getQuery()
                ->execute();
        }
        else if(isset($_POST['password']))
        {
            $em->createQueryBuilder()
                ->update('App\Entity\User', 'u')
                ->set('u.member_password_hash', '?1')
                ->where('u.id = ?2')
                ->setParameter(1, password_hash($_POST['password'], PASSWORD_DEFAULT))
                ->setParameter(2, $id)
                ->getQuery()
                ->execute();
        }
        App\Base\Route::redirect('settings/overview');
    }