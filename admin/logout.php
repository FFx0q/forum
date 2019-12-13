<?php
    if (isset($_SESSION['admin_login'])) {
        session_unset();
        session_destroy();
        session_start();
    }

    header('Location: login.php');
