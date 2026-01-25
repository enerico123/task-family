<?php

require_once __DIR__ . '/../models/Task.php';

class TaskController
{
    public function new(){
        require __DIR__ . '/../views/parent/new_task.php';
    }

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
}
