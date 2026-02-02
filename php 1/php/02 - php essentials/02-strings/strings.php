<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>
<body>
    <pre><?php

$greeting = 'Hello' . 123;
echo $greeting;
echo '<br>';

echo "Hello {$greeting}";

    ?></pre>
</body>
</html>