<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["updatestatus"])) {
    // Retrieve form data
    $recipient_email = $_POST["email"];
  
    // Check if file was uploaded without errors
    if (isset($_FILES["invoice"]) && $_FILES["invoice"]["error"] == UPLOAD_ERR_OK) {
        // File upload path
        $upload_directory = 'uploads/'; // Directory where files will be uploaded
        $invoice_file_name = $_FILES["invoice"]["name"];
        $invoice_file_tmp_name = $_FILES["invoice"]["tmp_name"];
        $invoice_file_path = $upload_directory . $invoice_file_name;

        // Move uploaded file to the upload directory
        if (move_uploaded_file($invoice_file_tmp_name, $invoice_file_path)) {
            // Create a PHPMailer instance
            $mail = new PHPMailer(true); // Enable verbose debug output

            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = ''; // 
                $mail->Password = '';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                // Set email parameters
                $mail->setFrom('inventory@gmail.com');
                $mail->addAddress($recipient_email);
                $mail->isHTML(true);
                $mail->Subject = 'K Motors Limited Your Order Invoice';
                $mail->Body = 'Thank you for choosing K Motors Limited for your car parts needs. Attached to this email, you\'ll find the invoice detailing your recent purchase for the required car parts to repair your vehicle. We encourage you to review the invoice thoroughly. Should you have any questions or require further assistance, please don\'t hesitate to reach out to us.<br><br>
                Best regards, K Motors Limited';
                // Attach invoice file
                $mail->addAttachment($invoice_file_path, $invoice_file_name);

                // Send the email
                $mail->send();
                echo "<script>alert('Email sent successfully!'); window.location.href = 'email.php';</script>";
            } catch (Exception $e) {
                echo "<script>alert('Email could not be sent. Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script>alert('Error moving uploaded file to destination directory!');</script>";
        }
    } else {
        echo "<script>alert('Error uploading file or file not selected!');</script>";
    }
}
?>
