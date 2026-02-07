<?php

require_once('./libs/rb-mysql.php');

try{
    R::setup(
        'mysql:host=' . DB_HOST .';dbname=' . DB_NAME,
        DB_USER,
        DB_PASS
    );

    if(!R::testConnection()){
        throw new Exception("Not connected to database");
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}