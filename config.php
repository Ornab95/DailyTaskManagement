<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "2020";
$dbname = "Task_Management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
