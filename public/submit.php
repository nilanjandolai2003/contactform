<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // 🔐 Use your Gmail credentials
        $mail->Username = 'nilanjandolai2003@gmail.com';
        $mail->Password = 'xwss geol urpj hzbf';  // Not your real password!
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('nilanjandolai2003@gmail.com', 'Nilu');  // Receiver

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission';
        $mail->Body    = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";

        $mail->send();
        echo "✅ Message sent successfully.";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
