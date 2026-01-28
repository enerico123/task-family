
<?php require __DIR__ . '/../layout/header.php'; ?>

    <h1>Connexion</h1>

    <form method="POST" action="/login">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required><br><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br><br>
    <button type="submit">Connexion</button>
    </form>

<?php require __DIR__ . '/../layout/footer.php'; ?>