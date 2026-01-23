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
      <tr>
        <td>Faire la vaisselle</td>
        <td>10</td>
        <td>Lucas</td>
        <td>En attente</td>
        <td><button>Valider</button></td>
      </tr>
      <tr>
        <td>Ranger la chambre</td>
        <td>15</td>
        <td>-</td>
        <td>Disponible</td>
        <td>-</td>
      </tr>
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
