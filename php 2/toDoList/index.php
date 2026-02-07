<?php

require __DIR__ . '/database.php';
global $pdo;

if (!empty($_POST)){
    $task = $_POST['task'];

    $stmt = $pdo->prepare("INSERT INTO `tasks` (`task`) VALUES (:task)");
    $stmt->bindValue('task', $task);
    $stmt->execute();
    header('Location: index.php');
}

$stmt = $pdo->prepare('SELECT * FROM `tasks` ORDER BY id DESC');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM `tasks` WHERE `id` = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: index.php');
}

if(isset($_GET['complete'])){
    $id = $_GET['complete'];
    $stmt = $pdo->prepare("UPDATE `tasks` SET status = 'completed' WHERE `id` = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    header('Location: index.php');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title> ToDoList </title>
</head>
<body>
    <div class="container">
        <h1>ToDoList</h1>
        <form method="POST" action="index.php">
            <input type="text" name="task" placeholder="Enter new task:" id="" required>
            <button type="submit" name="addtask">Add Task</button>
        </form>
        <ul>
            <?php foreach ($results as $result): ?>
                <li class="<?php echo $result['status'] ?>">
                    <strong><?php echo $result['task']; ?></strong>
                    <div class="actions">
                        <a href="index.php?complete=<?php echo $result['id'] ?>">Complete</a>
                        <a href="index.php?delete=<?php echo $result['id'] ?>">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>