<?php

namespace App;

require_once('../vendor/autoload.php');

use PHPMailer\PHPMailer\{
    PHPMailer,
    SMTP,
    Exception
};

use Configs\Mail;

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
    public static function send(string $name, string $email, string $subject, string $message, string $attachment_path = '', string $attachment_name = ''){

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = Mail::SMTP_DEBUG;                        // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = Mail::SMTP_HOST;                        // Set the SMTP server to send through
            $mail->SMTPAuth   = Mail::SMTP_AUTH;                        // Enable SMTP authentication
            $mail->Username   = Mail::SMTP_USERNAME;                    // SMTP username
            $mail->Password   = Mail::SMTP_PASSWORD;                    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = Mail::SMTP_PORT;                        // TCP port to connect to

            $mail->setFrom(Mail::SMTP_USERNAME,"");
            $mail->addAddress($email, $name);
            if(trim($attachment_path) !== ''){
                $mail->addAttachment($attachment_path, $attachment_name);
            }

            $mail->isHTML(true);                                // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();

//            self::success();

        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    }

//    public static function success(){
//        $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
//
//        header("Location: $host/App/task_2.php");
//    }
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

$content_view = 'views/task_2.php';
$title = 'Task 2';
include 'views/main.php';