<?php
include('db.php');
$object = new database();
if (!isset($_SESSION)) {
    session_start();
}
$user_email = $_POST["email"];
$user_contact = $_POST["contact"];
    $sql = "SELECT * FROM user WHERE email_id = '" . $user_email . "' AND mobile = '" . $user_contact . "'";	 
    $result = mysqli_query($object->dbConnection(), $sql);   
   if ($result) {	  
       $check = 1;      
        header("Location: forgot.php");
        exit();
    }   
 if ($check == 0) {
        header("Location: login.php?invalid=1");
        exit();
    }
?>
