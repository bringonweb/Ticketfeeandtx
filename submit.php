<?php
include 'db_connect.php'; // Include the connection file

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
    $date = mysqli_real_escape_string($conn, $_POST['Y-m-d H:i:s']);

    // SQL query to insert data
    // $sql = "INSERT INTO 'usairticketchanges' (first_name, last_name, email, phone, message) 
    //         VALUES ('$first_name', '$last_name', '$email', '$phone', '$message', '$date')";
    $sql="INSERT INTO `usairticketchanges`(`first_name`, `last_name`,`email`,`phone`, `message`, `date_time`) VALUES ('$first_name','$last_name','$email','$phone','$message','$date')";
    
    // After successful database insertion
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'adityagupta80041@gmail.com'; // Your Gmail
    $mail->Password   = 'zpzlkerohziiaouu'; // Your App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom('adityagupta80041@gmail.com', 'BusinessFlyDeals');
    $mail->addAddress('adityagupta80041@gmail.com'); // Where to send emails
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    
    // Build email body with all form data
    $email_body = "
        <h2>New Contact Request USAirTicketChanges</h2>
        <p><strong>Name:</strong> $first_name</p>
        <p><strong>Name:</strong> $last_name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Message:</strong></p>
        <p>".nl2br($message)."</p>
        <p><strong>Submitted at:</strong> $date</p>
    ";
    
    $mail->Body = $email_body;

    // Send email
    $mail->send();
    
    // Optional: Plain text version for non-HTML mail clients
    $mail->AltBody = "New Contact Request\n\n".
                     "first_name: $first_name\n".
                     "last_name: $last_name\n".
                     "email: $email\n".
                     "Phone: $phone\n".
                     "Message:\n$message\n\n".
                     "Submitted at: $date";
                     
        header('Location: thanks.php');

} catch (Exception $e) {
    // Log the error but don't break the user experience
    error_log("Mailer Error: " . $mail->ErrorInfo);
    // You can choose to handle this error differently if needed
}

    // Execute the query and check for errors
    if (mysqli_query($conn, $sql)) {
        echo "Inserted successfully!";
    } else {
        echo "Something went wrong: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "No data received.";
}
?>


