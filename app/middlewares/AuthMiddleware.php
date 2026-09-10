<?php

class AuthMiddleware
{
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /myproject/public/index.php/login');
            exit;
        }

        return $next();
    }
}