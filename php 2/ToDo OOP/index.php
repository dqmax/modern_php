<?php 

require __DIR__ . '/inc/db-connection.inc.php';

$action = (string) ($_GET['action'] ?? 'index');

if(!empty($_GET['title'])){
    $title = (string) ($_GET['title']);
}

if(isset($_GET['delete'])){
    $id = (int) ($_GET['delete']);
}

$stmt = $pdo->prepare('SELECT * FROM `tasks`');
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT COUNT(*) FROM tasks;');
$stmt->execute();
$count = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $count["COUNT(*)"];

if (!empty($action) && isset($action)){
    if ($action === 'submit'){
        $stmt = $pdo->prepare('INSERT INTO `tasks` (`title`) VALUES (:title)');
        $stmt->bindValue(':title', $title);
        $stmt->execute();

        header("Location: index.php");
    }

    if ($action === 'delete-all'){
        $stmt = $pdo->prepare('DELETE FROM `tasks`');
        $stmt->execute();

        header("Location: index.php");
    }

    if (isset($_GET['delete'])){
        $stmt = $pdo->prepare('DELETE FROM `tasks` WHERE `id` = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        header("Location: index.php");
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <div class="container__content">
            <h1>ToDo OOP</h1>

            <form action="index.php" method="GET">
                <div class="input__container">
                    <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter your task:">
                    <input type="submit" class="btn btn-primary" name="action" value="submit">
                </div>
                
                <ul class="list-group">
                    <?php foreach($tasks as $task): ?>
                        <div class="task__container">
                            <li class="list-group-item"><?php echo $task['title']?></li>
                            <button type="submit" class="btn btn-danger" name="delete" value="<?php echo $task['id']?>">X</button>    
                        </div>
                    <?php endforeach; ?>
                </ul>
                    
                <div class="active-tasks__container">
                    <p class="active-tasks__text">You have active: <b><u><?php echo $count;?></u></i></b> tasks.</p>
                    <button type="submit" class="btn btn-secondary" name="action" value="delete-all">Clear All</button>
                </div>
                    
            </form>
        </div>
    </div>
</body>
</html>