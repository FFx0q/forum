<?php
    session_start();

    require_once "src/auth.php";
    require_once "src/database.php";
    require_once "template/header.php";

    $id = intval($_GET['uid']);

    $sql = "DELETE FROM User WHERE id = {$id}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    header("Location: /admin/users.php ");
