<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if recipient email and message are set
if (isset($_POST["recipientEmail"]) && isset($_POST["message"])) {
    // Retrieve form data
    $recipient_email = $_POST["recipientEmail"];
    $message = $_POST["message"];

    // Create a PHPMailer instance
    $mail = new PHPMailer(true); // Enable verbose debug output

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = ''; // add email address here
        $mail->Password = ''; // create app password gmail
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Set email parameters
        $mail->setFrom('KMotorsLimited@gmail.com');
        $mail->addAddress($recipient_email);
        $mail->isHTML(true);
        $mail->Subject = 'K Motors Limited Car Ready';
        $mail->Body = $message;

        // Send the email
        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Email could not be sent. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Recipient email and message are required.";
}
?>
