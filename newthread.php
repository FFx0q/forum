<?php
    session_start();

    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');
    
    $date = new DateTime();
    $data = $date->getTimestamp();
    $controller = new App\Controller\QuestionController();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $title = isset($_POST['title']) ? $_POST['title'] : " ";
        $post = isset($_POST['post']) ? $_POST['post'] : " ";
        $uid = isset($_SESSION['login']) ? $_SESSION['login'] : 0;

        $controller->create($uid, $title, $post, $data);
    }