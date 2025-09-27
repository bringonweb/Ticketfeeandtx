<?php
include 'db_connect.php'; // Include the connection file
include 'config.php'; // Include the configuration file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Start session for flash messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validate required fields
    $required_fields = ['first_name', 'last_name', 'email', 'phone', 'message'];
    $errors = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field]) || trim($_POST[$field]) === '') {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . " is required.";
        }
    }
    
    // Validate email format
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    
    // Validate phone number
    if (!empty($_POST['phone']) && !preg_match('/^[\+]?[0-9\s\-\(\)]{10,15}$/', $_POST['phone'])) {
        $errors[] = "Please enter a valid phone number.";
    }
    
    // Validate message length
    if (!empty($_POST['message']) && strlen($_POST['message']) > 1000) {
        $errors[] = "Message must be less than 1000 characters.";
    }
    
    if (empty($errors)) {
        // Sanitize and trim input data
        $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
        $last_name = mysqli_real_escape_string($conn, trim($_POST['last_name']));
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
        $message = mysqli_real_escape_string($conn, trim($_POST['message']));
        $date = date('Y-m-d H:i:s');
        
        // Use prepared statement for better security
        $stmt = mysqli_prepare($conn, "INSERT INTO `contacts` (`first_name`, `last_name`, `email`, `phone`, `message`, `date_time`) VALUES (?, ?, ?, ?, ?, ?)");
        
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
                    $mail->addAddress(ADMIN_EMAIL); // Admin email
                    
                    // Reply-to user's email for easy response
                    $mail->addReplyTo($email, $first_name . ' ' . $last_name);
                    
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'New Contact Form Submission - TicketFeeAndTx';
                    
                    // Build professional email body
                    $email_body = "
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset='UTF-8'>
                        <title>New Contact Request</title>
                        <style>
                            body { 
                                font-family: Arial, sans-serif; 
                                line-height: 1.6; 
                                color: #333; 
                                margin: 0; 
                                padding: 0; 
                            }
                            .container { 
                                max-width: 600px; 
                                margin: 0 auto; 
                                background-color: #f9f9f9; 
                            }
                            .header { 
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                                color: white; 
                                padding: 20px; 
                                text-align: center; 
                            }
                            .content { 
                                padding: 20px; 
                                background-color: white; 
                                margin: 20px; 
                                border-radius: 8px; 
                            }
                            .field { 
                                margin-bottom: 15px; 
                                padding: 10px; 
                                border-left: 4px solid #667eea; 
                                background-color: #f8f9fa; 
                            }
                            .label { 
                                font-weight: bold; 
                                color: #555; 
                                display: block; 
                                margin-bottom: 5px; 
                            }
                            .value { 
                                color: #333; 
                            }
                            .footer { 
                                text-align: center; 
                                padding: 20px; 
                                font-size: 12px; 
                                color: #666; 
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h2>🎫 New Contact Request - TicketFeeAndTx</h2>
                            </div>
                            <div class='content'>
                                <div class='field'>
                                    <span class='label'>👤 Customer Name:</span>
                                    <span class='value'>" . htmlspecialchars($first_name . ' ' . $last_name, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                                <div class='field'>
                                    <span class='label'>📧 Email Address:</span>
                                    <span class='value'><a href='mailto:" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</a></span>
                                </div>
                                <div class='field'>
                                    <span class='label'>📞 Phone Number:</span>
                                    <span class='value'><a href='tel:" . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</a></span>
                                </div>
                                <div class='field'>
                                    <span class='label'>💬 Message:</span>
                                    <div class='value'>" . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</div>
                                </div>
                                <div class='field'>
                                    <span class='label'>🕒 Submitted at:</span>
                                    <span class='value'>" . htmlspecialchars($date, ENT_QUOTES, 'UTF-8') . "</span>
                                </div>
                            </div>
                            <div class='footer'>
                                <p>This message was sent from the TicketFeeAndTx contact form.</p>
                                <p>Please respond promptly to maintain customer satisfaction.</p>
                            </div>
                        </div>
                    </body>
                    </html>
                    ";
                    
                    $mail->Body = $email_body;
                    
                    // Send email
                    $mail->send();
                    
                    // Set success message
                    $_SESSION['success_message'] = "Thank you for contacting us! We'll get back to you within 24 hours.";
                    
                } catch (Exception $e) {
                    error_log("Mailer Error: " . $mail->ErrorInfo);
                    $_SESSION['warning_message'] = "Your message has been saved, but email notification failed. We'll still respond to your inquiry.";
                }
                
                mysqli_stmt_close($stmt);
                
                // Redirect to thank you page
                header('Location: thanks.php');
                exit();
                
            } else {
                $_SESSION['error_message'] = "Sorry, there was an error saving your message. Please try again.";
                error_log("Database insertion failed: " . mysqli_error($conn));
            }
            
            mysqli_stmt_close($stmt);
            
        } else {
            $_SESSION['error_message'] = "Database error occurred. Please try again later.";
            error_log("Database preparation failed: " . mysqli_error($conn));
        }
        
    } else {
        // Validation errors
        $_SESSION['error_message'] = "Please fix the following errors:\n• " . implode("\n• ", $errors);
    }
    
    // Close database connection
    mysqli_close($conn);
    
    // If there were errors, redirect back to form
    if (!empty($errors) || isset($_SESSION['error_message'])) {
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'contact.php'));
        exit();
    }
    
} else {
    $_SESSION['error_message'] = "Invalid request. Please use the contact form.";
    header('Location: contact.php');
    exit();
}
?>
