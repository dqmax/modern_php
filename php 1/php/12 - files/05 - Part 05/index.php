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

        $handle = opendir(__DIR__ . '/images');

        $images = [];
        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png'
        ];

        while (($currentFile = readdir($handle)) !== false) {
            if ($currentFile === '.' || $currentFile === '..') {
                continue;
            }

            $extension = pathinfo($currentFile, PATHINFO_EXTENSION);

            if (!in_array($extension, $allowedExtensions)) {
                continue;
            }

            $fileWithoutExt = pathinfo($currentFile, PATHINFO_FILENAME);
            $txtFile = __DIR__ . '/images/' . $fileWithoutExt . '.txt';

            $txtFile = file_get_contents($txtFile);
            $titleAndDescription = explode("\n", $txtFile, 2);
            $title = $titleAndDescription[0];
            $description = $titleAndDescription[1];


            $images[] = [
                    'image' => $currentFile,
                    'title' => $title,
                    'description' => $description,
            ];
        }

        var_dump($images);

        closedir($handle);
    ?></pre>

        <?php /* foreach($fileInfo['texts'] AS $text): ?>
            <?php echo file_get_contents(__DIR__ . '/images/' . $text) . '<br>'; ?>
        <?php endforeach; */ ?>
        <figure>
        <?php foreach($images AS $image): ?>
            <?php echo "<h2>{$image['title']}</h2>"?>
            <img src="images/<?php echo rawurlencode($image['image']); ?>" alt="" />
            <figcaption>
            <?php echo "<p>{$image['description']}</p>"?>
            </figcaption>
        <?php endforeach; ?>
        </figure>
        <!-- for each loop for text -->

    </main>
</body>
</html>