<?php
include 'db_connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'reservation@airlineswebsales.com';
                $mail->Password = 'xvtfpxrifncatjzg';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->setFrom('reservation@airlineswebsales.com', 'Ticketfeeandtx');
                $mail->addAddress('sharunch11@gmail.com');
                $mail->isHTML(true);
                $mail->Subject = 'New Contact Form Submission';
                $mail->Body = "<h2>New Contact Request</h2><p><strong>Name:</strong> $first_name $last_name</p><p><strong>Email:</strong> $email</p><p><strong>Phone:</strong> $phone</p><p><strong>Message:</strong> $message</p>";
                $mail->send();
            } catch (Exception $e) {
                // Continue even if email fails
            }
            header('Location: thanks.php');
            exit();
        } else {
            echo "Database error";
        }
    } else {
        echo "Missing fields";
    }
} else {
    echo "Invalid request";
}
?>


