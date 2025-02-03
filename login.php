<?php
session_start();
include('config.php'); // Ensure this file contains your database connection details

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the user exists
    $sql = "SELECT * FROM reg_info WHERE email = '$username'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) == 1) {
        // Fetch the user details
        $row = mysqli_fetch_assoc($res);
        $stored_password = $row['pass'];

        // Verify if the entered password matches the hashed password in the database
        if (password_verify($password, $stored_password)) {
            // Password is correct, start session
            $_SESSION['username'] = $username;
            header("Location: index.html"); // Redirect to home page
        } else {
            // Incorrect password
            echo "Invalid username or password. Please try again.";
        }
    } else {
        // User does not exist
        echo "Invalid username or password. Please try again.";
    }
}
?>



<!-- CreateTask.php
CreateTask.html 
delete.php
edittask.php
index.html
login.html
registration.html
registration.php
tasklist.php 
update.php -->