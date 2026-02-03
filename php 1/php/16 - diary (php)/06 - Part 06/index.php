<?php

header("Content-Type: text/plain");

$start = microtime(true);

// Date functions!
// UNIX timestamp
var_dump(time());
var_dump(microtime(true));

$end = microtime(true);
var_dump($end - $start);


date_default_timezone_set('Europe/Chisinau');
var_dump(date('Y-m-d H:i:s'));
var_dump(date('M/d/Y h:i a'));