<?php 

require_once './inc/all.inc.php';
require_once './config.php';

$alphabet = range('A', 'Z');

$name = (string) ($_GET['name'] ?? '');
        
$overview = get_name_overview($name);

render("index.view", [
    'overview' => $overview
]);