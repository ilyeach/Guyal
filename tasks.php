<?php
include('db.php'); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        // Handle adding a new task
        $taskDescription = $_POST['task'];

        $sql = "INSERT INTO tasks (description) VALUES ('$taskDescription')";

        if ($conn->query($sql) === true) {
            echo "Task added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['edit'])) {
        // Handle editing a task
        $taskId = $_POST['task_id'];
        $updatedTask = $_POST['task_description'];

        $sql = "UPDATE tasks SET description = '$updatedTask' WHERE id = $taskId";

        if ($conn->query($sql) === true) {
            echo "Task updated successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['remove'])) {
        // Handle removing tasks
        $tasksToRemove = $_POST['task'];

        // Convert the tasks to be removed to a comma-separated string
        $taskIds = implode(", ", $tasksToRemove);

        $sql = "DELETE FROM tasks WHERE id IN ($taskIds)";

        if ($conn->query($sql) === true) {
            echo "Tasks removed successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$tasks = array();

// Retrieve tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

$conn->close();
?>
