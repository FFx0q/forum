<?php 
    session_start();

    require_once "src/auth.php";
    require_once "src/database.php";
    require_once "template/header.php";

    $id = intval($_GET['uid']);

    $sql = "SELECT * FROM User WHERE id = {$id}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div id="content">
    <?php include "form/edit_form.php" ?>
</div>

<?php
    if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['reputation'])) {
        $name = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $reputatin = intval($_POST['reputation']);

        $sql = "UPDATE User SET name = '$name', email='$email', reputation='$reputatin' WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(); 
    }
?>