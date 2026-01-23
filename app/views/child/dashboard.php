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

  <h1>Espace Enfant</h1>

  <h2>Mes points</h2>
  <p><strong>Points actuels :</strong> 40</p>

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
      <tr>
        <td>Faire la vaisselle</td>
        <td>10</td>
        <td>En cours</td>
        <td><button>J’ai terminé</button></td>
      </tr>
    </tbody>
  </table>

  <h2>Tâches disponibles</h2>
  <table>
    <thead>
      <tr>
        <th>Tâche</th>
        <th>Points</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ranger la chambre</td>
        <td>15</td>
        <td><button>Prendre la tâche</button></td>
      </tr>
      <tr>
        <td>Sortir les poubelles</td>
        <td>5</td>
        <td><button>Prendre la tâche</button></td>
      </tr>
    </tbody>
  </table>

</body>
</html>