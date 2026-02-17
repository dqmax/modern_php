<?php

header('Content-Type: text/plain; charset=utf-8');

$message = 'The hotel costs $ 250.00, and the flight is € 150.00. And this number is just annoying: 123.00';
var_dump(preg_match('/(\$) ([0-9]+\.[0-9]{2})/', $message, $matches));
var_dump($matches);