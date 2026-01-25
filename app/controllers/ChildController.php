<?php

require_once __DIR__ . '/../models/Task.php';

class ChildController {

  public function dashboard() {

    
    $tasks_dispo = Task::getAllTaskDispo();
    $childId = $_SESSION['user_id'];
    $tasks_enfant_cible = Task::getTaskChildId($childId);
    require '../app/views/child/dashboard.php';
  }
}

?>