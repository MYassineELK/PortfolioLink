<?php

class Middleware
{
    public static function auth(): void
    {
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?action=p_login');
            exit;
        }
    }

    public static function guest(): void
    {
        if (isset($_SESSION['email'])) {
            header('Location: index.php?action=home');
            exit;
        }
    }

    public static function linkedIn(): void
    {
        if (!isset($_SESSION['linkedin_token'])) {
            header('Location: index.php?action=linkedin_connect');
            exit;
        }

        if (time() > ($_SESSION['linkedin_expires'] ?? 0)) {
            unset($_SESSION['linkedin_token']);
            header('Location: index.php?action=linkedin_connect');
            exit;
        }
    }
}