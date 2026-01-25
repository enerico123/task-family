<?php

require_once __DIR__ . '/../models/Task.php';

class ParentController {

  public function dashboard() {
    
    $tasks = Task::getAllTask();
    $leaders = Task::getAllLeaders();
    require '../app/views/parent/dashboard.php';

  }
}
?>