<?php
session_start();
include('config.php'); // Database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // Redirect to login page if not logged in
    exit();
}

// Get logged-in user's email
$user_email = $_SESSION['username'];

// Fetch tasks from the database
$sql = "SELECT * FROM tasks WHERE user_email = '$user_email' ORDER BY task_date, task_time";
$res = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
            <h2 class="text-3xl font-extrabold text-black mb-6 text-center">Your Tasks</h2>

            <?php if (mysqli_num_rows($res) > 0): ?>
                <ul class="space-y-4">
                    <?php while ($row = mysqli_fetch_assoc($res)): ?>
                        <li class="bg-gray-100 p-4 rounded-lg shadow-sm">
                            <h3 class="font-bold"><?= $row['task_name']; ?></h3>
                            <p><strong>Date:</strong> <?= $row['task_date']; ?></p>
                            <p><strong>Time:</strong> <?= $row['task_time'] ? $row['task_time'] : 'N/A'; ?></p>
                            <a href="edittask.php?id=<?= $row['id']; ?>" class="text-blue-500">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="text-red-500">Delete</a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p class="text-center text-gray-500">You have no tasks yet.</p>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>
