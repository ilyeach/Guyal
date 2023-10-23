<?php

	include('db.php'); 
	$object = new database();

	if(!isset($_SESSION))
	{
		session_start();
	}
		$user_name = $_POST["name"];
      	$user_email =  $_POST["email"];
		$user_grnder = $_POST["grnder"];
		$user_contact = $_POST["contact"];
		$user_password = $_POST["password"];
		
		
         	$sql = "SELECT * FROM user WHERE email_id = '" . $user_email . "'";
$result = mysqli_query($object->dbConnection(), $sql);


    $row = $result->fetch_assoc();
	

    if ($row>0) {
        header("Location: userdetails.php?er=1");
        exit;
    }
		
		else
		{	
		$query ="INSERT INTO `user` (`userName`, `mobil`, `email_id`, `password`, `gender`,  `created_at`) VALUES ('$user_name','$user_contact', '$user_email', '$user_password', '$user_grnder', 'NOW()')";
		
	    
		$result=mysqli_query($object->dbConnection(), $query);

		 if ($result) {
		header("Location:  login.php?reg=1");
		exit;
		} else {
		header("Location:  userdetails.php?error=1");
		exit;
		}
}
?>