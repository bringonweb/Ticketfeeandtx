<?php
// Database connection details
$host = "localhost"; // Your database host
$user = "u570369157_businessflydea";      // Your database username
$password = "u570369157_Businessflydea";      // Your database password
$database = "u570369157_businessflydea"; // Your database name

// Create connection using mysqli_connect
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>