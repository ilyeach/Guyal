<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
  $selectedTasks = $_POST['task'];

  if (isset($_SESSION['tasks']) && is_array($selectedTasks) && count($selectedTasks) > 0) {
    foreach ($selectedTasks as $selectedTask) {
      $key = array_search($selectedTask, $_SESSION['tasks']);
      if ($key !== false) {
        unset($_SESSION['tasks'][$key]);
      }
    }
  }
}

header('Location: home.php');
?>
