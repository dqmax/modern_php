<?php

// database connections
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'names_project';

const ROOT = __DIR__ . '/';
define('HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/'); // http://localhost

function p($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

function pd($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die();
}