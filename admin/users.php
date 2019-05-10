<?php
    session_start();
    
    require_once "src/auth.php";
    require_once "src/database.php";
    require_once "template/header.php";
    
    $sql = "SELECT * FROM User";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Users list</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Joined</th>
                                <th>Reputation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    foreach ($stmt as $row) {
                                        $u = $row['join_date'];
                                        $date = new DateTime("@$u");
                                        echo "<tr>";
                                        echo "<td>".htmlspecialchars($row['name'])."</td>";
                                        echo "<td>".htmlspecialchars($row['email'])."</td>";
                                        echo "<td>".htmlspecialchars($date->format('Y-m-d'))."</td>";
                                        echo "<td>".htmlspecialchars($row['reputation'])."</td>";
                                        echo "<td><ul class='list-unstyled'>
                                            <a href='edit_user.php?uid={$row['id']}' class='btn btn-warning'>Edit</a>
                                            <a onclick='return confirm(\"Delete this user?\")' href='delete_user.php?uid={$row['id']}' class='btn btn-danger'>Delete</a>
                                        ";
                                        echo "</tr>";
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once "template/footer.php";

