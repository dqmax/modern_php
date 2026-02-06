<?php
require __DIR__ . '/inc/db-connect.inc.php';
require __DIR__ . '/inc/functions.inc.php';
global $pdo;

date_default_timezone_set('Europe/Chisinau');

$perPage = 2;
$page = (int) ($_GET['page'] ?? 1);
$offset = ($page - 1) * $perPage;

$stmt = $pdo->prepare('SELECT * FROM `entries` ORDER BY `date` DESC, `id` DESC LIMIT :perPage OFFSET :offset');
$stmt->bindValue('perPage', $perPage, PDO::PARAM_INT);
$stmt->bindValue('offset', (int) $offset, PDO::PARAM_INT);
$stmt->execute();
$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmtCount = $pdo->prepare('SELECT COUNT(*) as `count` FROM `entries`');
$stmtCount->execute();
$count = $stmtCount->fetch(PDO::FETCH_ASSOC)['count'];
$numPages = ceil($count / $perPage);


?>

<?php include __DIR__ . '/inc/header.inc.php'; ?>

<main class="main">
    <div class="container">
        <h1 class="main-heading">Entries</h1>
        <?php foreach ($entries as $entry) : ?>
            <div class="card">
                <?php if (!empty($entry['image'])) : ?>
                    <div class="card__image-container">
                        <img class="card__image" src="images/pexels-lumn-167682.jpg" alt="" />
                    </div>
                <?php endif; ?>
                <div class="card__desc-container">
                    <div class="card__desc-time"><?php echo date('F j, Y', e(strtotime($entry['date'])))?></div>
                    <h2 class="card__heading"><?php echo e($entry['title'])?></h2>
                    <p class="card__paragraph">
                        <?php echo e($entry['message'])?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php if($numPages > 1):?>
        <ul class="pagination">
            <?php if ($page > 1) : ?>
                <li class="pagination__li">
                    <a class="pagination__link" href="index.php?<?php echo http_build_query(['page' => $page - 1])?>">⏴</a>
                </li>
            <?php endif; ?>
            <?php for($number = 1; $number <= $numPages; $number++) : ?>
                <li class="pagination__li">
                    <a class="pagination__link <?php if ($page === $number) echo "pagination__link--active"?>" href="index.php?<?php echo http_build_query(['page' => $number])?>"><?php echo $number;?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page < $numPages) : ?>
                <li class="pagination__li">
                    <a class="pagination__link" href="index.php?<?php echo http_build_query(['page' => $page + 1])?>">⏵</a>
                </li>
            <?php endif; ?>
        </ul>
    <?php endif;?>
    </div>
</main>

<?php include_once __DIR__ . '/inc/footer.inc.php'; ?>
