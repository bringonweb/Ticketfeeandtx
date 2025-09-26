<?php
include 'db_connect.php'; // Include the connection file
include 'config.php'; // Include the configuration file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validate required fields
    $required_fields = ['first_name', 'last_name', 'email', 'phone', 'message'];
    $errors = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . " is required.";
        }
    }
    
    // Validate email format
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    
    // Validate phone number (basic validation)
    if (!empty($_POST['phone']) && !preg_match('/^[\+]?[0-9\s\-\(\)]{10,15}$/', $_POST['phone'])) {
        $errors[] = "Please enter a valid phone number.";
    }
    
    if (empty($errors)) {
        // Sanitize input data
        $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
        $last_name = mysqli_real_escape_string($conn, trim($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
        $message = mysqli_real_escape_string($conn, trim($_POST['message']));
        $date = date('Y-m-d H:i:s');
        
        // Use prepared statement for better security
        $stmt = mysqli_prepare($conn, "INSERT INTO `usairticketchanges` (`first_name`, `last_name`, `email`, `phone`, `message`, `date_time`) VALUES (?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $phone, $message, $date);
            
            if (mysqli_stmt_execute($stmt)) {
                // After successful database insertion, send email
                $mail = new PHPMailer(true);
                
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = SMTP_HOST;
                    $mail->SMTPAuth   = true;
                    $mail->Username   = SMTP_USERNAME;
                    $mail->Password   = SMTP_PASSWORD;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = SMTP_PORT;
                    
                    // Recipients
                    $mail->setFrom(SMTP_USERNAME, FROM_NAME);
                    $mail->addAddress(ADMIN_EMAIL);
                    
                    // Reply-to address (user's email)
                    $mail->addReplyTo($email, $first_name . ' ' . $last_name);
                    
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'New Contact Form Submission - USAirTicketChanges';
                    
                    // Build email body with proper HTML structure
                    $email_body = "
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset='UTF-8'>
                        <title>New Contact Request</title>
                        <style>
                            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                            .header { background-color: #f4f4f4; padding: 20px; text-align: center; }
                            .content { padding: 20px; }
                            .field { margin-bottom: 15px; }
                            .label { font-weight: bold; color: #555; }
                            .value { margin-left: 10px; }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h2>New Contact Request - USAirTicketChanges</h2>
                            </div>
                            <div class='content'>
                                <div class='field'>
                                    <span class='label'>First Name:</span>
                                    <span class='value'>" . htmlspecialchars($first_name, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                                <div class='field'>
                                    <span class='label'>Last Name:</span>
                                    <span class='value'>" . htmlspecialchars($last_name, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                                <div class='field'>
                                    <span class='label'>Email:</span>
                                    <span class='value'>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                                <div class='field'>
                                    <span class='label'>Phone:</span>
                                    <span class='value'>" . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                                <div class='field'>
                                    <span class='label'>Message:</span>
                                    <div class='value'>" . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</div>
                                </div>
                                <div class='field'>
                                    <span class='label'>Submitted at:</span>
                                    <span class='value'>" . htmlspecialchars($date, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>
                    ";
                    
                    $mail->Body = $email_body;
                    
                    // Send email
                    $mail->send();
                    
                    // Set success message in session
                    $_SESSION['success_message'] = "Thank you for your message. We'll get back to you soon!";
                    
                } catch (Exception $e) {
                    error_log("Mailer Error: " . $mail->ErrorInfo);
                    $_SESSION['error_message'] = "Message saved but email notification failed. We'll still respond to your inquiry.";
                }
                
                // Close prepared statement
                mysqli_stmt_close($stmt);
                
                // Redirect to thank you page
                header('Location: thanks.php');
                exit();
                
            } else {
                $_SESSION['error_message'] = "Database error: " . mysqli_error($conn);
                error_log("Database insertion failed: " . mysqli_error($conn));
            }
            
            mysqli_stmt_close($stmt);
            
        } else {
            $_SESSION['error_message'] = "Database preparation error: " . mysqli_error($conn);
            error_log("Database preparation failed: " . mysqli_error($conn));
        }
        
    } else {
        // Validation errors
        $_SESSION['error_message'] = "Please fix the following errors: " . implode(", ", $errors);
    }
    
    // Close the database connection
    mysqli_close($conn);
    
    // If there were errors, redirect back to form
    if (!empty($errors) || isset($_SESSION['error_message'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
} else {
    $_SESSION['error_message'] = "Invalid request method.";
    header('Location: contact.php'); // Redirect to contact form
    exit();
}
?>
    