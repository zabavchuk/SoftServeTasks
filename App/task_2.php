<?php

namespace App;

require_once('../vendor/autoload.php');
require('../env.php');

use PHPMailer\PHPMailer\{
    PHPMailer,
    SMTP,
    Exception
};

/**
 * Class Email
 * @package App
 */
class Email{

    /**
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     * @param string $attachment_path
     * @param string $attachment_name
     */
    public static function send(string $name, string $email, string $subject, string $message, string $attachment_path = '', string $attachment_name = '')
    {

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = $_ENV['SMTP_DEBUG'];                        // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = $_ENV['SMTP_HOST'];                        // Set the SMTP server to send through
            $mail->SMTPAuth   = $_ENV['SMTP_AUTH'];                        // Enable SMTP authentication
            $mail->Username   = $_ENV['SMTP_USERNAME'];                    // SMTP username
            $mail->Password   = $_ENV['SMTP_PASSWORD'];                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = $_ENV['SMTP_PORT'];                        // TCP port to connect to

            $mail->setFrom($_ENV['SMTP_USERNAME'],"");
            $mail->addAddress($email, $name);
            if(trim($attachment_path) !== ''){
                $mail->addAttachment($attachment_path, $attachment_name);
            }

            $mail->isHTML(true);                                // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();

        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    }
}

if(isset($_POST['name'])){
    Email::send(
        $_POST['name'],
        $_POST['email'],
        $_POST['subject'],
        $_POST['message'],
        $_FILES['file']['tmp_name'],
        $_FILES['file']['name']
    );

    $message_sent = 'Message sent!';
}

$content_view = 'Views/task_2.php';
$title = 'Task 2';
include 'Views/main.php';