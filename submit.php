<?php
include 'db_connect.php';

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
            header('Location: thanks.php');
            exit();
        } else {
            echo "Database error: " . mysqli_error($conn);
        }
    } else {
        echo "Missing required fields";
    }
} else {
    echo "Invalid request method";
}
?>