<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');
    
    session_start();

    $date = new DateTime();
	$controller = new App\Controller\PostController();
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $post = isset($_POST['post']) ? $_POST['post'] : " ";
        $qid = isset($_GET['qid']) ? $_GET['qid'] : " ";
        $uid = isset($_SESSION['login']) ? (int)$_SESSION['login'] : " ";
        $data = $date->getTimestamp();

        $controller->create($uid, $qid, $post, $data, 0);
    }