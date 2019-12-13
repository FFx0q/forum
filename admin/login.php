<?php
    session_start();

    require_once "src/database.php";
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administrator Panel</title>

        <link rel="stylesheet" href="/admin/public/css/login.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="wrapper">
            <form class="form-signin" method="post">
                <?php require_once "form/login_form.php"; ?>
            </form>
        </div>
    </body>
</html>

<?php
    if (!empty($_POST['username']) and !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $sql = "SELECT * FROM User WHERE name = '{$username}'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($username == $result['name'] &&
            password_verify($password, $result['member_password_hash']) &&
            $result['group_id'] == 1
        ) {
            $_SESSION['admin_login'] = $result['id'];
            header('Location: index.php');
        } else {
            header('Location: login.php');
        }
    }
