<?php
include('db.php');
$object = new database();

if (!isset($_SESSION)) {
    session_start();
}

$newpassword = $_POST['password'];
$repassword = $_POST['newpassword'];

if ($newpassword == $repassword) {
$st = "UPDATE user SET password = '" . $newpassword . "'"; 
   $result = mysqli_query($object->dbConnection(), $st);
    if ($result) {
        header("Location: login.php?done=1");
        exit();
    } 
} 
    header("Location: forgot?invalid=1");
    exit();
?>
