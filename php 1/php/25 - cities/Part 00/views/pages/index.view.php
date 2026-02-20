<h1>List of cities:</h1>

<ul>
    <?php foreach($entries as $city): ?>
        <li>
            <a href="city.php?<?php echo http_build_query(['id' => $city->id])?>">
                <?php echo $city->city;?> (<?php echo $city->country?>)
            </a>
        </li>
    <?php endforeach;?>
</ul>

<?php for ($i = 1; $i <= $paginator->getTotalPages(); $i++): ?>
    <a href="?page=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>

