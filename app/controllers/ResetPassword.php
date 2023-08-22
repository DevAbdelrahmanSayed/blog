<?php
/*
namespace BLOG\Controllers;

use BLOG\core\Controller;
use BLOG\models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ResetPassword extends Controller
{
    public function reset()
    {
        $this->view('reset', ['title' => 'Reset Password']);
    }

    public function initiateReset()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Check if the email exists in the database
            $userModel = new User();
            $userData = $userModel->select_email(['email' => $email]);

            if ($userData) {
                // Generate a unique token
                $token = bin2hex(random_bytes(32));

                // Set the expiration time (e.g., 1 hour from now)
                $expiresAt = time() + (60 * 60); // 1 hour

                // Store the token and expiration time in the password_reset table
                $userModel->storePasswordResetToken([
                    'email' => $email,
                    'token' => $token,
                    'expires_at' => $expiresAt
                ]);

                // Send the email to the user containing the reset link
                $resetLink = LINK . 'ResetPassword/reset.php?token=' . $token;
                $emailContent = "Please click the following link to reset your password: $resetLink";

                $this->sendEmail($email, 'Password Reset', $emailContent);

                // Display a success message or redirect the user to a confirmation page
            } else {
                // Email does not exist in the database, show an error message
            }
        }
    }

    public function sendEmail($recipientEmail, $subject, $content)
    {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'devabdelr2hman@gmail.com'; // Update with your email address
            $mail->Password   = 'ukabqlctckmwwnqv'; // Update with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('your-email@gmail.com', 'Your Name'); // Update with your name and email address
            $mail->addAddress($recipientEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $content;
            $mail->AltBody = 'Please use an HTML-enabled email client to view the message.';

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
*/