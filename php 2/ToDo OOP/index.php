<?php 

require __DIR__ . '/inc/database.php';
require __DIR__ . '/inc/autoload.php';

$taskRepository = new App\Repository\TaskRepository($pdo);
$taskService = new App\Controller\TaskService($taskRepository);
$taskController = new App\Controller\TaskController();

$taskController->action($taskService);
$tasks = $taskService->readAll();
$count = $taskService->countAll();

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
                    <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Enter your task:" required>
                    <input type="submit" class="btn btn-primary" name="action" value="submit">
                </div>
            </form>
                
            <form action="index.php" method="GET">
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