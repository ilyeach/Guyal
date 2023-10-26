<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    session_start();
    if(@$_SESSION["username"]){
  ?>
  <title>To-Do List</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS to increase the size of Bootstrap components */
    body {
      font-size: 18px; /* Increase the font size */
    }

    .list-group-item {
      font-size: 18px; /* Increase the font size */
      padding: 10px; /* Increase the padding */
    }

    .btn {
      font-size: 16px; /* Increase the font size of buttons */
      padding: 10px 20px; /* Increase the padding of buttons */
    }
  </style>
</head>

<body style="background-image: url('image/home 1.jpg'); background-size: cover;">
  <?php include('header.php'); ?>

  <div class="container">
    <h1>To-Do List</h1>
    <form action="add.php" method="POST">
      <div class="input-group mb-3">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        <input type="text" class="form-control" name="task" placeholder="Add a new task" required>
        <div class="input-group-append">
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </div>
    </form>
    <form action="remove.php" method="POST">
      <ul class="list-group">
  <?php
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM tasks WHERE email_id = '$username'";
    $result = mysqli_query($object->dbConnection(), $sql);

if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $task = $row['description'];
    $t_id = $row['id'];

    // Add a hidden input field to store the task ID
    echo '<li class="list-group-item" data-username="' . $username . '" data-taskid="' . $t_id . '">';
    echo '<input type="checkbox" name="task[' . $t_id . ']" value="' . $task . '">';
    echo '<span>' . $task . '</span>';
    echo '<input type="hidden" name="task_id[' . $t_id . ']" value="' . $t_id . '">';
    echo '<button class="check-button btn btn-warning btn-sm float-right">Edit</button>';
    echo '</li>';
  }
}

  ?>
</ul>

      <button type="submit" class="btn btn-danger">Remove Selected</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
  const checkButtons = document.querySelectorAll(".check-button");
  checkButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const listItem = this.parentNode;
      const taskText = listItem.querySelector("span");

      const inputField = document.createElement("input");
      inputField.type = "text";
      inputField.className = "form-control edit-task";
      inputField.value = taskText.textContent;

      const saveButton = document.createElement("button");
      saveButton.className = "save-button btn btn-success btn-sm float-right";
      saveButton.textContent = "Save";

      listItem.replaceChild(inputField, taskText);
      listItem.appendChild(saveButton);
      button.style.display = "none";

      // Disable the "Check" button when editing
      this.disabled = true;

      saveButton.addEventListener("click", function () {
        const editedValue = inputField.value;
        taskText.textContent = editedValue;
        listItem.replaceChild(taskText, inputField);
        listItem.removeChild(saveButton);
        button.style.display = "inline";

        // Enable the "Check" button after saving
        button.disabled = false;

        // Send the edited value to editaction.php using an AJAX request
        const taskId = listItem.dataset.taskid;
        const username = listItem.dataset.username;
        sendEditedValueToServer(taskId, editedValue, username);
      });
    });
  });
});

function sendEditedValueToServer(taskId, editedValue, username) {
  const xhr = new XMLHttpRequest();
  const url = "editaction.php";

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the server's response if needed
    }
  };

  const data = "taskId=" + encodeURIComponent(taskId) + "&editedValue=" + encodeURIComponent(editedValue) + "&username=" + encodeURIComponent(username);
  xhr.send(data);
}


  </script>
</body>
</html>
<?php 
  } else {
    header("Location: login.php");
    exit();
  }
?>
 