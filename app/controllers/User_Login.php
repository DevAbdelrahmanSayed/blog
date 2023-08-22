<?php

namespace BLOG\Controllers;

use BLOG\core\Controller;
use BLOG\models\User;
use BLOG\core\Valid;

class User_Login extends Controller
{
    public function login()
    {
        $this->view('login', ['title' => 'Login']);
    }

    public function post_login()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $valid = new Valid();
            $email = $valid->testInput($_POST['email']);
            $password = $valid->testInput($_POST['password']);


            $valid->checkEmpty($email, $errors, 'Email is required');
            $valid->filterEmail($email, $errors, 'Invalid email format');
            $valid->checkEmpty($password, $errors, 'Password is required');

            // Check if the email exists in the database
            $select = new User();
            $userData = $select->select_email(['email' => $email]);

            if ($userData && password_verify($password, $userData['password'])) {
                // Password is correct, set session variables
                session_start();
                $_SESSION['username'] = $userData['username'];
                $_SESSION['user_id'] = $userData['user_id'];

                // Redirect to the home page or any other protected page
                header('Location: ' . LINK . 'Home');
                exit;
            } else {
                $errors['password'] = 'Incorrect email or password';
            }
        }

        $this->view('login', ['title' => 'Login', 'errors' => $errors]);
    }

    public function logout()
    {
        session_start();
        // Clear any output buffering
        ob_end_clean();

        // Unset all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect to the login page
        header('Location: ' . LINK . 'User_Login/login');
        exit;
    }
}
