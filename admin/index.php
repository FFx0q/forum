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
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">group</i>
                </div>
                <p class="card-category">Users</p>
                <h3 class="card-title"><?= $result[1]['u'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">forum</i>
                </div>
                <p class="card-category">Qesution</p>
                <h3 class="card-title"><?= $result[2]['q'] ?></h3>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">comment</i>
                </div>
                <p class="card-category">Post</p>
                <h3 class="card-title"><?= $result[0]['p'] ?></h3>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <?php require_once("template/footer.php"); ?>
</footer>
</div>