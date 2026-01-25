<?php

require_once __DIR__ . '/../models/Task.php';

class ChildController {

  public function dashboard() {

    $tasks_dispo = Task::getAllTaskDispo();
    require '../app/views/child/dashboard.php';
  }
}

?>