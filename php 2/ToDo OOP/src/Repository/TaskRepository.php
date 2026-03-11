<?php

namespace App\Repository;

use PDO;
use App\Model\TaskModel;

class TaskRepository {

    public function __construct(private PDO $pdo){}

    public function delete($id){
        $stmt = $this->pdo->prepare('DELETE FROM `tasks` WHERE `id` = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        header("Location: index.php");
    }

    public function deleteAll(){
        $stmt = $this->pdo->prepare('DELETE FROM `tasks`');
        $stmt->execute();

        header("Location: index.php");
    }

    public function countAll(){
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM tasks;');
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $count["COUNT(*)"];
        return $count;
    }

    public function readAll(){
        $stmt = $this->pdo->prepare('SELECT * FROM `tasks`');
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $stmt->setFetchMode(PDO::FETCH_CLASS, TaskModel::class);
        // $tasks = $stmt->fetch();
        
        return $tasks;
    }

    public function addNew($title){
        $stmt = $this->pdo->prepare('INSERT INTO `tasks` (`title`) VALUES (:title)');
        $stmt->bindValue(':title', $title);
        $stmt->execute();

        header("Location: index.php");
    }
}

