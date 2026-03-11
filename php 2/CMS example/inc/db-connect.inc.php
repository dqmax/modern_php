<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cms;charset=utf8mb4', 'cms', 'tcx1i)1-z[Fm)*6Y', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    die();
}

