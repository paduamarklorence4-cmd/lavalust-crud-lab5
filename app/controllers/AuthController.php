<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        if ($this->io->method() === 'post') {
            $usersModel = $this->call->model('UsersModel');
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $usersModel->find_by('username', $username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                redirect('products');
                return;
            }

            $data['error'] = 'Invalid username or password.';
            $this->call->view('login_view', $data);
            return;
        }

        $this->call->view('login_view');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect('login');
    }
}