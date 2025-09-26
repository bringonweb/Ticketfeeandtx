<?php
include 'db_connect.php';
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `usairticketchanges`(`first_name`, `last_name`,`email`,`phone`, `message`, `date_time`) VALUES ('$first_name','$last_name','$email','$phone','$message','$date')";
        
        if (mysqli_query($conn, $sql)) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = SMTP_HOST;
                $mail->SMTPAuth = true;
                $mail->Username = SMTP_USERNAME;
                $mail->Password = SMTP_PASSWORD;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = SMTP_PORT;
                $mail->setFrom(SMTP_USERNAME, FROM_NAME);
                $mail->addAddress(ADMIN_EMAIL);
                $mail->isHTML(true);
                $mail->Subject = 'New Contact Form Submission';
                $mail->Body = "<h2>New Contact Request</h2><p><strong>Name:</strong> ".htmlspecialchars($first_name)." ".htmlspecialchars($last_name)."</p><p><strong>Email:</strong> ".htmlspecialchars($email)."</p><p><strong>Phone:</strong> ".htmlspecialchars($phone)."</p><p><strong>Message:</strong></p><p>".nl2br(htmlspecialchars($message))."</p>";
                $mail->send();
            } catch (Exception $e) {
                error_log("Mailer Error: " . $mail->ErrorInfo);
            }
            header('Location: thanks.php');
            exit();
        } else {
            echo "Database error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Missing required fields";
    }
} else {
    echo "No data received";
}
?>


