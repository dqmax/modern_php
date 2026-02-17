<?php 

require_once './inc/all.inc.php';
require_once './config.php';

$alphabet = range('A', 'Z');

$char = (string) ($_GET['char'] ?? '');
if (strlen($char) > 1) {
    $char = $char[0];
}

if (strlen($char) === 0){
    header("Location: index.php");
    die();
}

$char = strtoupper($char);

$names = fetch_names_by_initial($char);

render("char.view", [
    'names' => $names,
    'char' => $char
]);

