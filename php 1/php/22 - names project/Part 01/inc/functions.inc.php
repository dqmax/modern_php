<?php

declare(strict_types=1);

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

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function fetch_names_by_initial(string $char): array {
    global $pdo;
    $stmt = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC');
    $stmt->bindValue(':expr', "{$char}%");
    $stmt->execute();
    $names = [];
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results AS $result) {
        $names[] = $result['name'];
    }
    return $names;
}

function fetch_entries_for_specific_names(string $name): array {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM `names` WHERE `name` = :name ORDER BY `year` ASC;');
    $stmt->bindValue(':name', $_GET['name']);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function get_name_overview(string $name): array {
    global $pdo;
    $stmt = $pdo->prepare('SELECT `name`, SUM(`count`) AS `sum` FROM `names` GROUP BY `name` ORDER BY `sum` DESC LIMIT 10');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}

function render($view, $params) {
    extract($params);

    ob_start();
    require __DIR__ . '/../views/pages/' . $view . '.php';
    $contents = ob_get_clean();

    require __DIR__ . '/../views/layouts/main.view.php';
}