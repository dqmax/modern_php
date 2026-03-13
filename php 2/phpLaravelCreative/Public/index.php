<?php 

// require_once __DIR__ . "/../App/Worker.php";
require_once __DIR__ . "/../vendor/autoload.php";

$worker = new \App\Worker();
$worker->work();