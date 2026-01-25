<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Espace Parent</title>
  <style>
    /*a mettre dans css*/
    body { font-family: Arial; padding: 20px; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background: #f4f4f4; }
    button { padding: 6px 12px; }
  </style>
</head>
<body>
  <header><a href="/logout">Se déconnecter</a></header>
  <h1>Espace Parent</h1>

  <h2>Créer une tâche</h2>
  <button>+ Nouvelle tâche</button>

  <h2>Liste des tâches</h2>
  <table>
    <thead>
      <tr>
        <th>Tâche</th>
        <th>Points</th>
        <th>Assignée à</th>
        <th>Statut</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($tasks as $task){
        $titre = $task["title"];
        $description = $task["description"];
        $points = $task["points"];
        $status = $task["status"];
        $created_by = $task["created_by"];
        if (empty($task["assigned_to"])) {
            $assigned_name = ' - ';
        } else {
            $assigned_name = $task["assigned_name"];
        }
        $id = $task["id"];


        echo '<tr>';
          echo '<td>'.$titre.'</td>';
          echo '<td>'.$points.'</td>';
          echo '<td>'.$assigned_name.'</td>';
          echo '<td>'.$status.'</td>';
          if($status === 'en attente'){
            echo '<td><button>Valider</button></td>';
          } else {
            echo ' - '; 
          }
          
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>

  <h2>Points des enfants</h2>
  <table>
    <thead>
      <tr>
        <th>Enfant</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Lucas</td>
        <td>40</td>
      </tr>
      <tr>
        <td>Emma</td>
        <td>25</td>
      </tr>
    </tbody>
  </table>

</body>
</html>
