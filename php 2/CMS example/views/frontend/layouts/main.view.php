<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <link rel="stylesheet" type="text/css" href="./styles/custom.css" />
    <title>CMS Project</title>
</head>
<body>
    <header>
        <h1>
            <a href="index.php">CMS Project</a>
        </h1>
        <p>A custom-made CMS system</p>
        <nav>
            <a href="index.php?page=index">Home</a>
            <a href="index.php?page=about-us">About Us</a>
        </nav>
    </header>
    <main>
        <?php echo $contents; ?>
    </main>
    <footer>
        <p></p>
    </footer>
</body>
</html>