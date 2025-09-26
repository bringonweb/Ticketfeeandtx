<?php
include 'db_connect.php'; // Include the connection file
include 'config.php'; // Include the configuration file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if (isset($_POST['submit'])) {
    // Sanitize input to prevent SQL injection
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $date = date('Y-m-d H:i:s');

    // SQL query to insert data
    $sql = "INSERT INTO `contacts`(`first_name`, `last_name`,`email`,`phone`, `message`, `date_time`) VALUES ('$first_name','$last_name','$email','$phone','$message','$date')";
    
    // Execute the query and check for errors
    if (mysqli_query($conn, $sql)) {
        // After successful database insertion, send email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = "smtp.gmail.com";
            $mail->SMTPAuth   = true;
            $mail->Username   = "reservation@airlineswebsales.com";
            $mail->Password   = "xvtfpxrifncatjzg";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = "587";

            // Recipients
            $mail->setFrom(SMTP_USERNAME, FROM_NAME);
            $mail->addAddress(ADMIN_EMAIL);
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            
            // Build email body with sanitized data
            $email_body = "
                <h2>New Contact Request USAirTicketChanges</h2>
                <p><strong>First Name:</strong> ".htmlspecialchars($first_name)."</p>
                <p><strong>Last Name:</strong> ".htmlspecialchars($last_name)."</p>
                <p><strong>Email:</strong> ".htmlspecialchars($email)."</p>
                <p><strong>Phone:</strong> ".htmlspecialchars($phone)."</p>
                <p><strong>Message:</strong></p>
                <p>".nl2br(htmlspecialchars($message))."</p>
                <p><strong>Submitted at:</strong> $date</p>
            ";
            
            $mail->Body = $email_body;

            // Send email
            $mail->send();
            
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
        }
        
        // Redirect to thank you page
        header('Location: thanks.php');
        exit();
    } else {
        echo "Something went wrong: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No data received.";
}
?>


