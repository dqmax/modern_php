<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occurred with the database connection...';
    die();
}
