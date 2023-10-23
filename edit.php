<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['taskIndex']) && isset($_POST['updatedTask'])) {
  $taskIndex = $_POST['taskIndex'];
  $updatedTask = $_POST['updatedTask'];

  if (isset($_SESSION['tasks']) && isset($_SESSION['tasks'][$taskIndex])) {
    $_SESSION['tasks'][$taskIndex] = $updatedTask;
  }
}

header('Location: home.php');
?>
