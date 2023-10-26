<?php
include('db.php'); 
	$object = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
  $task = $_POST['task'];
  $name=$_POST['username'];
 

                                       
 
  $sql="INSERT INTO `tasks`( `email_id`,`description`) VALUES ('$name','$task')";
$result=mysqli_query($object->dbConnection(), $sql);
  if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
  }

  array_push($_SESSION['tasks'], $task);
}

header('Location: home.php');
?>
