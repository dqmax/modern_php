<?php

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

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