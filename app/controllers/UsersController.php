<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function index()
    {
        $usersModel = $this->call->model('UsersModel');
        $data['users'] = $usersModel->all();
        $this->call->view('users_view', $data);
    }
}