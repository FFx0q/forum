<?php
    if(!isset($_SESSION['admin_login'])) {
        header("Location: /admin/login.php");
    }

    $time = $_SERVER['REQUEST_TIME'];
    $timeout_duration = 1800;

    if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset();
        session_destroy();
        session_start();
    }
    
    $_SESSION['LAST_ACTIVITY'] = $time;