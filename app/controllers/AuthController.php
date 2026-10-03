<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
    }

    public function login()
    {
        $input    = $this->api->body();
        $username = trim($input['username'] ?? '');
        $password = $input['password'] ?? '';

        if ($username === '' || $password === '') {
            $this->api->respond_error('Username and password are required', 422);
        }

        $usersModel = $this->call->model('UsersModel');
        $user = $usersModel->find_by('username', $username);

        if ($user && password_verify($password, $user['password'])) {
            $tokens = $this->api->issue_tokens([
                'id'   => $user['id'],
                'role' => $user['role'] ?? 'user',
            ]);
            $this->api->respond($tokens);
        }

        $this->api->respond_error('Invalid username or password', 401);
    }

    public function logout()
    {
        $input = $this->api->body();
        $this->api->revoke_refresh_token($input['refresh_token'] ?? '');
        $this->api->respond(['message' => 'Logged out']);
    }

    public function refresh()
    {
        $input = $this->api->body();
        $this->api->refresh_access_token($input['refresh_token'] ?? '');
    }
}