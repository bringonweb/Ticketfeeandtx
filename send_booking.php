<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_POST) {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $from = htmlspecialchars($_POST['from']);
    $to = htmlspecialchars($_POST['to']);
    $departure = htmlspecialchars($_POST['departure']);
    $return = htmlspecialchars($_POST['return']);
    $travelers = htmlspecialchars($_POST['travelers']);
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reservation@airlineswebsales.com'; // Replace with your email
        $mail->Password = 'xvtfpxrifncatjzg'; // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        // Recipients
        $mail->setFrom('reservation@airlineswebsales.com', 'TicketFeeAndTx');
        $mail->addAddress('sharunch11@gmail.com'); // Admin email
        $mail->addReplyTo($email, $name);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Flight Search Request - TicketFeeAndTx';
        
        $emailBody = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { background: #f8f9fa; padding: 30px; border-radius: 0 0 8px 8px; }
                .info-row { margin: 15px 0; padding: 10px; background: white; border-radius: 5px; }
                .label { font-weight: bold; color: #2563eb; }
                .flight-details { background: #e3f2fd; padding: 20px; border-radius: 8px; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>New Flight Search Request</h2>
                    <p>TicketFeeAndTx.com</p>
                </div>
                <div class='content'>
                    <h3>Customer Information</h3>
                    <div class='info-row'>
                        <span class='label'>Name:</span> $name
                    </div>
                    <div class='info-row'>
                        <span class='label'>Phone:</span> $phone
                    </div>
                    <div class='info-row'>
                        <span class='label'>Email:</span> $email
                    </div>
                    
                    <div class='flight-details'>
                        <h3>Flight Details</h3>
                        <div class='info-row'>
                            <span class='label'>From:</span> $from
                        </div>
                        <div class='info-row'>
                            <span class='label'>To:</span> $to
                        </div>
                        <div class='info-row'>
                            <span class='label'>Departure Date:</span> $departure
                        </div>
                        <div class='info-row'>
                            <span class='label'>Return Date:</span> " . ($return ? $return : 'One Way') . "
                        </div>
                        <div class='info-row'>
                            <span class='label'>Travelers:</span> $travelers
                        </div>
                    </div>
                    
                    <p><strong>Submitted:</strong> " . date('Y-m-d H:i:s') . "</p>
                </div>
            </div>
        </body>
        </html>";
        
        $mail->Body = $emailBody;
        $mail->send();
        
        // Redirect to thank you page
        header('Location: thankyou.php');
        exit();
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('Location: index.php');
    exit();
}
?>