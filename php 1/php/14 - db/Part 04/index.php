<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=note_app', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->prepare("SELECT * FROM `notes`");
$stmt->execute();
$result = $stmt->fetchAll();
var_dump($result);