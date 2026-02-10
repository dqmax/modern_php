<?php

// configuration
require_once('./config.php');
require_once('./db.php');

global $count_undone;
global $count_done;

// create
if(isset($_POST['title']) && !empty(trim($_POST['title']))){

    $task = R::dispense('tasks');
    $task->title = $_POST['title'];
    $id = R::store($task);
    echo 'ID: ' . $id;
}

// delete
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task = R::load('tasks', $_GET['id']);
    R::trash($task);
}

// update
if (isset($_GET['action']) && $_GET['action'] === 'changeStatus' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $task = R::load('tasks', $_GET['id']);
    if ($task->status === 'ready'){
        $task->status = NULL;
    } else {
        $task->status = 'ready';
    }
  R::store($task);
}


// get all tasks
$tasks = R::findAll('tasks');

// statistics
$count_tasks = count($tasks);

$count_done = 0;
foreach ($tasks as $task) {
    if ($task->status === 'ready'){
        $count_done++;
    }
}

$count_undone = $count_tasks - $count_done;

?><!DOCTYPE html>
<html lang="ru">
<?php include(ROOT . 'templates/page_parts/head.tpl'); ?>

<body class="todo-app p-5">
    <?php include(ROOT . 'templates/page_parts/header.php'); ?>

	<ul class="list-group mb-3">
        <?php

        if (empty($tasks)){
           include(ROOT . 'templates/empty.tpl');
        } else {
            foreach ($tasks as $task){
                include(ROOT . 'templates/task.php');
            }
        }
        ?>

	</ul>

<?php include(ROOT . 'templates/page_parts/form.tpl'); ?>

</body>
</html>
