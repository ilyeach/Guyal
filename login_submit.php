<?php
include('db.php'); 
$object = new database();
if(!isset($_SESSION))
{
	session_start();
}
if(isset($_POST['username']) && $_POST['password'])
{
	$query="SELECT * FROM user WHERE email_id= '".$_POST['username']."' AND password='".$_POST['password']."'" ;
	
	$result=mysqli_query($object->dbConnection(), $query);
	
	if (mysqli_num_rows($result) === 1) {
		$_SESSION["username"]= $_POST['username'];
		
		header("Location: home.php");
		exit;
	} else {	
		header("Location: login.php?error=1");
		exit;
	}
}

?>