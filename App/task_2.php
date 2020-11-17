<?php

namespace App;

use PHPMailer\PHPMailer\{
    PHPMailer,
    SMTP,
    Exception
};
use Configs\ConfigMail;

require_once ('../vendor/autoload.php');
//require_once ('../Configs/ConfigMail.php');

class Email{

    public static function send(){

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = ConfigMail::SMTP_DEBUG;              // Enable verbose debug output
            $mail->isSMTP();                                        // Send using SMTP
            $mail->Host       = ConfigMail::SMTP_HOST;              // Set the SMTP server to send through
            $mail->SMTPAuth   = ConfigMail::SMTP_AUTH;              // Enable SMTP authentication
            $mail->Username   = ConfigMail::SMTP_USERNAME;          // SMTP username
            $mail->Password   = ConfigMail::SMTP_PASSWORD;          // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = ConfigMail::SMTP_PORT;              // TCP port to connect to

            $mail->setFrom(ConfigMail::SMTP_USERNAME,"");
            $mail->addAddress($_POST['email'], $_POST['name']);
            if(trim($_FILES['file']['tmp_name']) !== ''){
                $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
            }

            $mail->isHTML(true);                                // Set email format to HTML
            $mail->Subject = $_POST['subject'];
            $mail->Body    = $_POST['message'];

            $mail->send();

            self::success();

        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    }

    public static function success(){
        $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

        header("Location: $host/App/views/task_2.php");
    }
}

if(!isset($_POST['name'])){
    $content_view = 'views/task_2.php';
    $title = 'Task 2';
    include 'views/main.php';
}
else{
    Email::send();
}