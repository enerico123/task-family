<h1>Nouvelle tâche</h1>

<form method="POST" action="/tasks/create">
    <label>Titre</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Points</label><br>
    <input type="number" name="points" min="0" required><br><br>

    <button type="submit">Créer</button>
</form>

<br>
<a href="/parent">Retour</a>