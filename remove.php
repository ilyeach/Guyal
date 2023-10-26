<?php
include('db.php'); 
$object = new database();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && is_array($_POST['task']) && isset($_POST['task_id'])) {
        $tasks = $_POST['task'];
        $taskIds = $_POST['task_id']; // Contains the task IDs corresponding to each selected task

        // Loop through the selected tasks and their associated task IDs
        foreach ($tasks as $key => $task) {
            $task_id = $taskIds[$key]; // Get the corresponding task ID for this task
			$sql="DELETE FROM `tasks` WHERE id=$task_id";
			
			$result=mysqli_query($object->dbConnection(), $sql);
			if($result){
header('Location: home.php');
            
        }
			
		}

       
    }
}

?>
