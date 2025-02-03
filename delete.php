<?php
include('config.php');

// Check if task ID is provided for deletion
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Delete task query
    $sql = "DELETE FROM tasks WHERE id = $task_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: tasklist.php");  // Redirect to task list after deletion
    } else {
        echo "Error deleting task: " . mysqli_error($conn);
    }
}
?>
