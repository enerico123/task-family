<?php

require_once __DIR__ . '/../models/User.php';

class AuthController {

  public function showLogin() {
    require '../app/views/auth/login.php';
  }

  public function login(){

    // ce que l'utilisateur a rentré, récupérer depuis formulaire
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    //$user données de l'utilisateur dans la db (role, id)
    $user = User::findByUsername($username);

    // utilisateur inexistant OU mauvais mot de passe
    if (!$user || !password_verify($password, $user['password_hash'])) {
        echo 'Identifiants incorrects';
        exit;
    }
    

    // utilisateur valide → session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role']    = $user['role'];

    // redirection selon rôle
    if ($user['role'] === 'parent') {
        header('Location: /parent');
    } else {
        header('Location: /child');
    }

    exit;
  }
}

?>