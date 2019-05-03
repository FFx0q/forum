<?php
    session_start();
    
    require_once "src/auth.php";
    require_once "src/database.php";
    require_once "template/header.php";
    
    $sql = "SELECT * FROM User";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
<div id="content">
    <table class="table table-borderless">
        <thead class="thead-light">
            <th>Name</th>
            <th>Email Address</th>
            <th>Joined</th>
            <th>Reputation</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                foreach ($stmt as $row) {
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($row['name'])."</td>";
                    echo "<td>".htmlspecialchars($row['email'])."</td>";
                    echo "<td>".htmlspecialchars($row['join_date'])."</td>";
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

<?php
    require_once "template/footer.php";

