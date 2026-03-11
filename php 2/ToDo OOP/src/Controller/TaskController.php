<?php

namespace App\Controller;

class TaskController {

    public function action($taskService){
        $action = (string) ($_GET['action'] ?? 'index');

        $title = (string) ($_GET['title'] ?? 'title');

        if(isset($_GET['delete'])){
            $id = (int) ($_GET['delete']);
        }

        if (!empty($action) && isset($action)){
            if ($action === 'submit'){
                $taskService->addNew($title);
            }

            if ($action === 'delete-all'){
                $taskService->deleteAll();
            }

            if (isset($_GET['delete'])){
                $taskService->delete($id);
            }
        }
    }
}