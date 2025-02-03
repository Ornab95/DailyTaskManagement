<?php
session_start();
include('config.php'); // Include the database connection file

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}

// Get the form data
if (isset($_POST['task_name']) && isset($_POST['task_date'])) {
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $task_date = mysqli_real_escape_string($conn, $_POST['task_date']);
    $task_time = isset($_POST['task_time']) ? mysqli_real_escape_string($conn, $_POST['task_time']) : NULL;
    $user_email = $_SESSION['username']; // Get logged-in user's email

    // Insert task into the database
    $sql = "INSERT INTO tasks (task_name, task_date, task_time, user_email) 
            VALUES ('$task_name', '$task_date', '$task_time', '$user_email')";

    if (mysqli_query($conn, $sql)) {
        header("Location: tasklist.php"); // Redirect to task list page after success
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
