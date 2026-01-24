<?php

class Auth
{
    public static function check()
    {
        return isset($_SESSION['user_id']);
    }

    public static function requireLogin()
    {
        if (!self::check()) {
            header('Location: /login');
            exit;
        }
    }

    public static function requireRole(string $role)
    {
        self::requireLogin();

        if ($_SESSION['role'] !== $role) {
            header('Location: /login');
            exit;
        }
    }
}