<?php

class Auth
{
    public static function check(): bool
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

    public static function requireRole(string $role): void 
    {
        self::requireLogin();

        if ($_SESSION['role'] !== $role) {
            header('Location: /login');
            exit;
        }
    }
}