<?php
include('db.php');
$object = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['taskId']) && isset($_POST['editedValue']) && isset($_POST['username'])) {
        $taskId = $_POST['taskId'];
        $editedValue = $_POST['editedValue'];
        $username = $_POST['username'];

        // Perform the database update here, using your database connection

        // Assuming you have a connection in $object->dbConnection(), you might use a query like this:
        $sql = "UPDATE tasks SET description = '$editedValue' WHERE id = '$taskId' AND email_id = '$username'";
        $result = mysqli_query($object->dbConnection(), $sql);

        if ($result) {
            header("Location: login.php?done=1");
            exit();
        } else {
            echo "Failed to update the task in the database.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request.";
}
