<?php
include('config.php');

// Check if form data is posted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $task_date = mysqli_real_escape_string($conn, $_POST['task_date']);
    $task_time = mysqli_real_escape_string($conn, $_POST['task_time']);

    // Update task query
    $sql = "UPDATE tasks SET task_name = '$task_name', task_date = '$task_date', task_time = '$task_time' WHERE id = $task_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: tasklist.php");  // Redirect to task list after updating
    } else {
        echo "Error updating task: " . mysqli_error($conn);
    }
}
?>
