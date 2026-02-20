<?php

require __DIR__ . '/inc/all.inc.php';

$worldCityRepository = new WorldCityRepository($pdo);
$entries = $worldCityRepository->fetch();

$page = $_GET['page'] ?? 1;
$page = max(1, (int)$page);

$repo = new WorldCityRepository($pdo);

$totalItems = $repo->countAll();

$paginator = new Paginator($totalItems, 10, $page);

$cities = $repo->getPaginated(
    $paginator->getLimit(),
    $paginator->getOffset()
);

render('index.view', [
    'entries' => $entries,
    'paginator' => $paginator
]);


