<?php
include('config.php'); // Ensure this file contains your database connection details

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_email_query = "SELECT * FROM reg_info WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email_query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "Email already registered. Please try a different one.";
    } else {
        // Insert new user data into the database
        $sql = "INSERT INTO reg_info (fname, lname, email, pass) VALUES ('$fname', '$lname', '$email', '$hashed_password')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful! <a href='login.html'>Login here</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>