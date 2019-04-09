<?php
    session_start();

    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/config/app.php');

    use App\Base\Router;
    use App\Base\Model;

    if(empty($_GET['uid']))
        Router::redirect('/settings/index');

    $id = $_GET['uid'];
    $db =  Model::getInstance();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['email']))
        {
            $sql = "UPDATE User SET `email` = :email WHERE id = {$id}";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
        }
        else if(isset($_POST['display_name']))
        {
            $sql = "UPDATE User SET `name` = :name WHERE id = {$id}";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $_POST['display_name']);
            $stmt->execute();
        }
        else if(isset($_POST['password']))
        {
            $sql = "UPDATE User SET member_password_hash = :hash WHERE id = {$id}";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':hash', password_hash($_POST['password']));
            $stmt->execute();
        }
        
        Router::redirect('/settings/index');
    }