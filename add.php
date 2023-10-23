<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
  $task = $_POST['task'];

  if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
  }

  array_push($_SESSION['tasks'], $task);
}

header('Location: home.php');
?>
