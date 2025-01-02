<?php
namespace BLOG\Controllers;

use BLOG\core\Controller;
use BLOG\models\User;
use BLOG\Controllers\SendVerificationEmail;
use BLOG\core\Valid;

class Registration extends Controller
{
    public function Signup()
    {
        $this->view('Signup', ['title' => 'Signup']);
    }

    public function post_signup()
    {
        $errors = [];
        $insert = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $valid = new Valid();

            $username =$valid->testInput($_POST['username']);
            $email = $valid->testInput($_POST['email']);
            $password = $valid->testInput($_POST['password']);
            $confirmPassword = $valid->testInput($_POST['confirm_password']);
            $profile = $_FILES['profile']['tmp_name'];

            $valid->checkEmpty($username, $errors,'Username is required');
            $valid->checkAlphanumeric($username, $errors, 'Only letters and numbers are allowed');
            if ($insert->select_users(['username' => $username])) {
                $errors['username'] = 'Username already exists';
            }

            $valid->checkEmpty($email, $errors, 'Email is required');
            $valid->filterEmail($email, $errors, 'Invalid email format');
            if ($insert->select_email(['email' => $email])) {
                $errors['email'] = 'Email already exists';
            }

            $valid->checkEmpty($password, $errors, 'Password is required');
            if ($password !== $confirmPassword) {
                $errors['confirm_password'] = 'Password and Confirm Password do not match';
            } else {
                    $valid->checkCommonPasswords($password, $errors, ['password', '123456', 'qwerty'], 'Password is commonly used and not secure.');
            }

            $valid->validateFileFormat($profile, $errors, ['image/jpeg', 'image/png'], 'Invalid file format. Only JPG and PNG files are allowed');
 
            if (empty($errors)) {
                $target_dir = 'C:/laragon/www/blog/public/front/images/';
                $filename = pathinfo($_FILES['profile']['name'], PATHINFO_FILENAME);
                $extension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
                $target_file = $target_dir . $filename . '.' . $extension;
              
                if (move_uploaded_file($profile, $target_file)) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

                    $params = [
                        'username' => $username,
                        'email' => $email,
                        'password' => $hashedPassword,
                        'profile' => $filename . '.' . $extension,
                        'verification_code' => $verification_code,
                    ];

                    $insert->insert_user($params);

                    $sendEmails = new SendVerificationEmail();
                    $sendEmails->sendEmail($email, $verification_code);

                    header('Location:' . LINK . 'SendVerificationEmail/verify');
                    exit;
                } else {
                    $errors['profile'] = 'Failed to upload the profile picture.';
                }
            }
        }

        $oldValues = [
            'username' => $username ?? '',
            'email' => $email ?? '',
            'password' => $password ?? '',
            'confirm_password' => $confirmPassword ?? '',
        ];

        $data = [
            'title' => 'Signup',
            'errors' => $errors,
            'oldValues' => $oldValues,
        ];

        $this->view('Signup', $data);
    }
}
