<?php

namespace App\Controller;

use App\Repository\TaskRepository;

class TaskService {
    public function __construct(private TaskRepository $taskRepository){}

    public function readAll(){
        return $this->taskRepository->readAll();
    }

    public function countAll(){
        return $this->taskRepository->countAll();
    }

    public function delete($id){
        return $this->taskRepository->delete($id);
    }

    public function deleteAll(){
        return $this->taskRepository->deleteAll();
    }

    public function addNew($title){
        return $this->taskRepository->addNew($title);
    }
}