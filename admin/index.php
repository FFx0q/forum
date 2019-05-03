<?php
    session_start();
    require_once "src/auth.php";
    require_once "src/database.php";
    require_once "template/header.php";

    $result = [];

    $sql = [
        "SELECT COUNT(*) as p FROM Post",
        "SELECT COUNT(*) as u FROM User",
        "SELECT COUNT(*) as q FROM Question",
    ];

    for ($i=0; $i < 3; $i++) { 
        $stmt[$i] = $pdo->prepare($sql[$i]);
        $stmt[$i]->execute();
        $result[$i] = $stmt[$i]->fetch(PDO::FETCH_ASSOC);
    }

?>

<div id="content">
    <div class="row justify-content-center">
        <div class="card col-sm-3 text-center w-25">
            <div class="card-body">
                <h5 class="card-title">Posts</h5>
                <p class="card-text"><?php echo $result[0]['p'] ?></p>
            </div>
        </div>
        <div class="card col-sm-43 text-center w-25">
            <div class="card-body">
                <h5 class="card-title">Questions</h5>
                <p class="card-text"><?php echo $result[2]['q'] ?></p>
            </div>
        </div>
        <div class="card col-sm-3 text-center w-25">
            <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text"><?php echo $result[1]['u'] ?></p>
            </div>
        </div>
    </div>
</div>