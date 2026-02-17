<?php

header('Content-Type: text/plain');

$message = 'Happy 30th Birthday!';

$matches = null;
var_dump(preg_match('/\d/', $message, $matches));
var_dump($matches);

var_dump(preg_match_all('/Happy|Bithday/', $message, $matches));
var_dump($matches);

var_dump(preg_match('/\w{5}/', $message, $matches));
var_dump($matches);

var_dump(preg_match('/\w{6,10}/', $message, $matches));
var_dump($matches);

$str = "Hello, World! 123";
preg_match_all('/[a-zA-Z0-9]/', $str, $matches);
var_dump($matches);