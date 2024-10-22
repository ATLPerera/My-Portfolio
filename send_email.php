<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    try {
        // Set up the SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Set Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'tharinduperera1998910@gmail.com';  // Your Gmail address
        $mail->Password = 'xvqw piej nbdv nvzj';  // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set the sender and recipient details
        $mail->setFrom($email, $name);
        $mail->addAddress('tharinduperera1998910@gmail.com');

        // Email subject and body
        $mail->Subject = "New Hire Request: $subject";
        $mail->Body = "You have received a new hire request.\n\n";
        $mail->Body .= "Name: $name\n";
        $mail->Body .= "Email: $email\n\n";
        $mail->Body .= "Message:\n$message\n";

        // Send the email
        $mail->send();
        echo 'Message has been sent successfully';
        // Redirect to a thank you page (optional)
        header("Location: thank_you.html");
        exit;

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
