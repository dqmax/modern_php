<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=todo_oop', 'root', '',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo 'A problem occured with database connection.';
    die();
}