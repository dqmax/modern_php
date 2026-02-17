<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=names_db;charset=utf8mb4', 'names_db', '/7Iyp-wAdnr3(W.]', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    die();
}

/*
$stmt = $pdo->prepare('SELECT * FROM `names`');
$stmt->execute();
var_dump($stmt->fetch(PDO::FETCH_ASSOC));
*/