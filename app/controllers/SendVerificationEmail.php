<?php
namespace BLOG\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use BLOG\core\Controller;
use BLOG\models\User;

class SendVerificationEmail extends Controller
{
    public function verify()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verify'])) {
            
            $verification_code = $_POST['verification_code'];
            $code_ver = new User();
            if ($code_ver->select_code(['verification_code' => $verification_code])) {
                // Verification code matched, redirect to login page
                header('Location: ' . LINK . 'User_Login/login');
                exit;
            } else {
                $errors['verification_code'] = 'Invalid verification code';
                $this->view('Verify', ['title' => 'Verify Email', 'errors' => $errors]);
            }
        } else {
            $this->view('Verify', ['title' => 'Verify Email']);
        }
    }

    public function sendEmail($recipientEmail, $verification_code)
    {
        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'devabdelr2hman@gmail.com';
            $mail->Password   = 'azaezwuthvvhlxuf';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Recipients
            $mail->setFrom('devabdelr2hman@gmail.com', 'code_hunters');
            $mail->addAddress($recipientEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body    = '
                <html>
                <head>
                    <style>
                        /* CSS Styles for Email */
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f5f5f5;
                        }
            
                        .email-container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #fff;
                            border-radius: 5px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
            
                        h1 {
                            color: #333;
                            text-align: center;
                        }
            
                        p {
                            color: #555;
                            line-height: 1.5;
                        }
            
                        .verification-code {
                            font-weight: bold;
                            color: #000;
                        }
                    </style>
                </head>
                <body>
                    <div class="email-container">
                        <h1>Email Verification</h1>
                        <p>Thank you for signing up. Please enter the verification code below:</p>
                        <p>Verification Code: <span class="verification-code">' . $verification_code . '</span></p>
                    </div>
                </body>
                </html>
            ';
            $mail->AltBody = 'Please use an HTML-enabled email client to view the message.';

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
