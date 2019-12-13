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

    $u = $result['join_date'];
    $date = new DateTime("@$u");
?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <?php include "form/edit_form.php" ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <img class="img" src="/uploads/avatars/<?= $result['avatar_url']?>" />
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?= $result['name'] ?></h4>
                    <p class="card-description">
                        Joined: <?= $date->format('Y-m-d') ?>
                        <br /> Reputation: <?= $result['reputation'] ?>
                        <br /> Warning: <?= $result['warnings'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['username']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);
        $reputation = intval($_POST['reputation']);
        $warnings = intval($_POST['warnings']);

        $sql = "UPDATE User 
            SET name = '$name',email='$email', reputation='$reputation', warnings='$warnings' 
            WHERE id = $id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
