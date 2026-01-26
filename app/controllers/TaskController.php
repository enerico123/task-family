<?php

require_once __DIR__ . '/../models/Task.php';

class TaskController
{   
    //permet a un parent d'accéder à la page de création de tâches
    public function new(){
        require __DIR__ . '/../views/parent/new_task.php';
    }


    //permet a un parent de créer une tache 
    public function create(){
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $points = (int)($_POST['points'] ?? 0);
        $parentId = $_SESSION['user_id'];

        if ($title === '') {
            die('Titre obligatoire');
        }
        if ($points < 0) {
            die('Points négatif impossible');
        }

        Task::create($title,$description,$points,$parentId);
        
        header('Location: /parent');
        exit;
    }

    //permet a un enfant de prendre une tache
    public function take(){
        $taskId = (int)($_POST['task_id'] ?? 0);
        $childId = (int)$_SESSION['user_id'];
        if ($taskId <= 0){
            header('Location: /child');
            exit;
        }

        // ajouter une verif $ok (plus tard si bug)
        Task::assignToChild($taskId, $childId);
        header('Location: /child');
        exit;
    }

    public function finish(){
        $taskId = (int)($_POST['task_id'] ?? 0);

        Task::changeTaskStatus($taskId);
        header('Location: /child');
        exit;
    }
}
