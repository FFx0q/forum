<?php
    if(!isset($_SESSION['admin_login'])) {
        header("Location: /admin/login.php");
    }