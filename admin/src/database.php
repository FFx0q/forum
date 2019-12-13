<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=testowa', 'root', 'bP75meku');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
