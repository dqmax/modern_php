<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <title>Document</title>
</head>
<body>
    <header><h1>Automatic Image List</h1></header>
    <main><pre><?php 
//        $handle = opendir(__DIR__ . '/images');
//        var_dump($handle);
//        var_dump(readdir($handle));
//        var_dump(readdir($handle));
//        var_dump(readdir($handle));
//        var_dump(readdir($handle));
//        var_dump(readdir($handle));
//        var_dump(readdir($handle));
//        var_dump(readdir($handle));
//        closedir($handle);

    $images = [];

    $handle = opendir(__DIR__ . '/images');
    while (($file = readdir($handle)) !== false){
        if ($file === '.' || $file === '..' || $file === '.DS_Store') continue;
        var_dump($file);
        $images[] = $file;
    }
    closedir($handle);
    ?></pre></main>

    <?php foreach($images as $image): ?>
        <img src="images/<?php echo rawurldecode($image); ?>" alt="image">
    <?php endforeach; ?>
</body>
</html>