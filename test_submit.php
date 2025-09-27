<?php
// Simple test version
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($message)) {
        $_SESSION['error_message'] = 'All fields are required.';
        header('Location: contact.php');
        exit();
    }
    
    // Test database connection
    include 'db_connect.php';
    
    if (!$conn) {
        $_SESSION['error_message'] = 'Database connection failed.';
        header('Location: contact.php');
        exit();
    }
    
    // Simple insert
    $stmt = mysqli_prepare($conn, "INSERT INTO contacts (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $phone, $message);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = 'Message sent successfully!';
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header('Location: thanks.php');
            exit();
        } else {
            $_SESSION['error_message'] = 'Failed to send message.';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['error_message'] = 'Database error.';
    }
    
    mysqli_close($conn);
    header('Location: contact.php');
    exit();
} else {
    header('Location: contact.php');
    exit();
}
?>