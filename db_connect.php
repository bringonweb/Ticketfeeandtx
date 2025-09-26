<?php
// Database connection details
$host = "localhost"; // Your database host
$user = "u746468631_ticketfeeandtx";      // Your database username
$password = "Ticketfeeandtx@!21";      // Your database password
$database = "u746468631_ticketfeeandtx"; // Your database name

// Create connection using mysqli_connect
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>