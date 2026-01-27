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
  <a href="/tasks/new">Nouvelle tâche</a>

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
        $assigned_to = $task["assigned_to"];
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
            echo '<td>';
            echo '<form method="POST" action="/tasks/validate">';
                echo '<input type="hidden" name="task_id" value="'.$id.'">';
                echo '<button type="submit">Valider</button>';
            echo '</form>';
            echo '</td>';
          } else {
            echo '<td> - </td>'; 
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
      <?php
      foreach($leaders as $leader){
        $nom = $leader['username'];
        $points = $leader['points'];

        echo '<tr>';
          echo '<td>'.$nom.'</td>';
          echo '<td>'.$points.'</td>';
        echo '</tr>';

      }
      ?>
    </tbody>
  </table>

</body>
</html>
