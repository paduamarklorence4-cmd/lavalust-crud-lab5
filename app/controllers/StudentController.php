<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        session_start();
        $_SESSION['student_access'] = true;

        $this->call->view('student_home');
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00212',
            'name'       => 'Mark Lorence Padua',
            'course'     => 'BS Information Technology',
            'year'       => '3rd Year',
            'section'    => '3-F5',
            'email'      => 'paduamarklorence4@gmail.com'
        ];

        $this->call->view('student_profile', $student);
    }
}
?>