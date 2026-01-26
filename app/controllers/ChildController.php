<?php

require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../models/User.php';

class ChildController {

  public function dashboard() {

    $childId = $_SESSION['user_id'];
    $points = User::pointChild($childId);
    $tasks_enfant_cible = Task::getTaskChildId($childId);

    $tasks_dispo = Task::getAllTaskDispo();


    require '../app/views/child/dashboard.php';
  }
}

?>