<?php

require_once './inc/all.inc.php';
require_once './config.php';

$alphabet = range('A', 'Z');

$name = (string) ($_GET['name'] ?? '');

if(empty($name)) {
    header("Location: index.php");
    die();
}

$entries = fetch_entries_for_specific_names($name); 

render("name.view", [
    'name' => $name,
    'entries' => $entries
]);