<?php
include('config.php');

// Fetch the task to edit
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = mysqli_query($conn, $sql);
    $task = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-lg mx-auto mt-10 p-8 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Task</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
            <div class="mb-4">
                <label for="task_name" class="block text-gray-700">Task Name</label>
                <input type="text" id="task_name" name="task_name" value="<?= $task['task_name'] ?>" required class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="task_date" class="block text-gray-700">Task Date</label>
                <input type="date" id="task_date" name="task_date" value="<?= $task['task_date'] ?>" required class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="task_time" class="block text-gray-700">Task Time</label>
                <input type="time" id="task_time" name="task_time" value="<?= $task['task_time'] ?>" required class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            <div class="text-center">
                <button type="submit" class="w-full py-3 bg-blue-500 text-white font-bold rounded-lg">Update Task</button>
            </div>
        </form>
    </div>
</body>
</html>
