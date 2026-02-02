<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>
<body>
<?php
function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
    $pages = [
        'citrus_salmon' => 'Citrus Symphony Salmon',
        'mediterranian_pasta' => 'Mediterranean Marvel Pasta',
        'sunset_risotto' => 'Sunset Risotto',
        'tropical_tacos' => 'Tropical Tacos',
    ];

?>

<form method="GET" action="include.php">
    <select name="page">
        <option value="">Please select a recipe</option>
        <?php foreach ($pages as $page => $title): ?>
            <option
                value="<?php echo e($page)?>"
                    <?php if (!empty($_GET['page']) && $_GET['page'] == $page) echo 'selected'; ?>>
            <?php echo e($title)?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Submit!" />
</form>

<?php
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
        if (!empty($pages[$page])) {
            echo file_get_contents("pages/{$page}.html");
        }
    }
?>


</body>
</html>