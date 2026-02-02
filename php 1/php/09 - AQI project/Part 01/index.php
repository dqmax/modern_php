<?php
require __DIR__ . '/inc/functions.inc.php';

// load index.json from data folder and turn to a php array
$content = json_decode(file_get_contents(__DIR__ . '/../data/index.json'),true);
//var_dump($content);
?>

<?php require __DIR__ . '/views/header.inc.php';?>

<?php //output an unordered list in html?>

<ul>
    <?php foreach ($content as $dataString): ?>
        <li><a href="city.php?<?php echo http_build_query(['city' => $dataString['city']]);?>">
                <?php echo "{$dataString['city']}, {$dataString['country']} ({$dataString['flag']})";?></a></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.inc.php';?>



<?php /*
require __DIR__ . '/inc/functions.inc.php';

$cities = json_decode(
    file_get_contents(__DIR__ . '/../data/index.json'),
    true
);

?>

<?php require __DIR__ . '/views/header.inc.php'; ?>

<ul>
    <?php foreach($cities AS $city): ?>
        <li>
            <a href="city.php?<?php echo http_build_query(['city' => $city['city']]); ?>">
                <?php echo e($city['city']); ?>,
                <?php echo e($city['country']); ?>
                (<?php echo e($city['flag']); ?>)
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.inc.php'; */ ?>