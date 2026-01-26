<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Espace Enfant</title>
  <style>
    /*a mettre dans css*/
    body { font-family: Arial; padding: 20px; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
    th, td { border: 1px solid #ccc; padding: 10px; }
    th { background: #f4f4f4; }
    button { padding: 6px 12px; }
  </style>
</head>
<body>
  <header><a href="/logout">Se déconnecter</a></header>
  <h1>Espace Enfant</h1>

  <h2>Mes points</h2>
  <?php
  foreach($points as $point){
    $pountos = $point["points"];

    echo '<p><strong>Points actuels :</strong> '.$pountos.'</p>';
  }
  ?>
  

  <h2>Tâche en cours</h2>
  <table>
    <thead>
      <tr>
        <th>Tâche</th>
        <th>Points</th>
        <th>Statut</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      foreach($tasks_enfant_cible as $enfant){
        $titre = $enfant["title"];
        $description = $enfant["description"];
        $points = $enfant["points"];
        $id = $enfant["id"];
        $status = $enfant["status"];

        echo '<tr>';
          echo '<td>'.$titre.'</td>';
          echo '<td>'.$points.'</td>';
          echo '<td>'.$status.'</td>';
          echo '<td><button>J\'ai terminé</button></td>';
        echo '</tr>';
      }
      if (!$tasks_enfant_cible){
        echo '<td colspan=4>';
        echo 'Aucune tâche en cours';
        echo '</td>';
      }
      ?>
    </tbody>
  </table>

  <h2>Tâches disponibles</h2>
  <table>
    <thead>
      <tr>
        <th>Tâche</th>
        <th>description</th>
        <th>Points</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($tasks_dispo as $task){
        $titre = $task["title"];
        $description = $task["description"];
        $points = $task["points"];
        $id = $task["id"];

        echo '<tr>';
          echo '<td>'.$titre.'</td>';
          echo '<td>'.$description.'</td>';
          echo '<td>'.$points.'</td>';
          echo '<td>';

          echo '<form method="POST" action="/tasks/take">';
          echo '    <input type="hidden" name="task_id" value="'.$id.'">';
          echo '    <button type="submit">Prendre la tâche</button>';
          echo '</form>';

          echo '</td>';
        echo '</tr>';
      }
      if (!$tasks_dispo){
        echo '<td colspan=4>';
        echo 'Aucune tâche disponible';
        echo '</td>';
      }
      ?>
      
    </tbody>
  </table>

</body>
</html>