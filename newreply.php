<?php
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');
    
    $date = new DateTime();
	$controller = new App\Controller\PostController();
    $em = $controller->getManager();
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $post = isset($_POST['post']) ? $_POST['post'] : " ";
        $tid = isset($_GET['tid']) ? $_GET['tid'] : " ";
        $uid = 1;
        $data = $date->getTimestamp();
        
        $controller->create($uid, $tid, $post, $data);
        
    }