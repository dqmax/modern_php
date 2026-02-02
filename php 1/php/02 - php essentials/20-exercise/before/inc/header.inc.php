<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/simple.css" />
    <link rel="stylesheet" href="./styles/custom.css" />
    <title>Culinary Cove &bull; <?php if(!empty($pageTitle)) { echo $pageTitle;} else { echo 'Default page';}?></title>
</head>
<body>
  <header class="header-with-background" style="background-image: url('<?php if(!empty($headerImg)) { echo $headerImg;} else { echo 'images/pexels-rachel-claire-4577740.jpg';}?>'); ">
    <h1>Culinary Cove</h1>
    <p>Your sanctuary for exceptional flavors</p>
    <nav>
      <a <?php if($pageKey == 'mission'){echo "class=\"active\"";}?>href="our-mission.php">Our mission</a>
      <a <?php if($pageKey == 'ingredients'){echo "class=\"active\"";}?>href="ingredients.php">Ingredients</a>
      <a <?php if($pageKey == 'menu'){echo "class=\"active\"";}?>href="menu.php">Menu</a>
    </nav>
  </header>

  <main>