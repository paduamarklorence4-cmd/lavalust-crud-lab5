<?php

class StudentMiddleware
{
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['student_access']) || $_SESSION['student_access'] !== true) {
            header('Location: /myproject/public/index.php/student');
            exit;
        }

        return $next();
    }
}