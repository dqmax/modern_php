<?php

$pdo = new PDO('mysql:host=localhost;dbname=note_app', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->prepare('SELECT * FROM `notes`');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($results);

foreach ($results as $result) { ?>
    <li> <?php echo $result['title'] . '<br>';?> </li>
<?php } ?>