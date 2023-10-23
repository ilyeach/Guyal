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
    /* Add your CSS styles here */
  </style>
</head>

<body style="background-image: url('image/home 1.jpg'); background-size: cover;">
  <?php include('header.php'); ?>

  <div class="container">
    <h1>To-Do List</h1>
    <form action="add.php" method="POST">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="task" placeholder="Add a new task" required>
        <div class="input-group-append">
          <button type="submit" class="btn btn-success">Add</button>
        </div>
      </div>
    </form>
    <form action="remove.php" method="POST">
      <ul class="list-group">
        <?php
        if (isset($_SESSION['tasks']) && count($_SESSION['tasks']) > 0) {
          foreach ($_SESSION['tasks'] as $key => $task) {
            echo '<li class="list-group-item">';
            echo '<input type="checkbox" name="task[]" value="' . $task . '">';
            echo '<span>' . $task . '</span>';
            echo '<button class="edit-button btn btn-warning btn-sm float-right">Edit</button>';
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
<!-- Your HTML code above this line -->

<script>
  const editButtons = document.querySelectorAll(".edit-button");
  editButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Check if the edit functionality is already applied
      if (this.classList.contains("editing")) {
        return;
      }
      this.classList.add("editing");

      const listItem = this.parentNode;
      const taskText = listItem.querySelector("span");
      const inputField = document.createElement("input");
      inputField.type = "text";
      inputField.className = "edit-task form-control";
      inputField.value = taskText.textContent;

      // Create the Save button before replacing the elements
      const saveButton = document.createElement("button");
      saveButton.className = "save-button btn btn-success btn-sm float-right";
      saveButton.textContent = "Save";

      // Replace the taskText with the inputField
      listItem.replaceChild(inputField, taskText);

      // Append the Save button after the inputField
      listItem.appendChild(saveButton);

      // Attach an event listener to the save button
      saveButton.addEventListener("click", function () {
        taskText.textContent = inputField.value;
        listItem.replaceChild(taskText, inputField);

        // Remove the Save button after saving
        listItem.removeChild(saveButton);

        // Remove the editing class to allow editing again
        button.classList.remove("editing");

        // Add a class to the Edit button to hide it temporarily
        button.classList.add("hidden-edit-button");

        // Add a delay (e.g., 5000 milliseconds) to show the Edit button again
        setTimeout(() => {
          button.classList.remove("hidden-edit-button");
        }, 5000); // 5000 milliseconds = 5 seconds (you can adjust the time as needed)
      });
    });
  });
  const element = document.querySelector(".your-css-selector");
if (element) {
  // The element exists
  // You can access and manipulate it here
} else {
  // The element does not exist
  // Handle the case where the element is missing
}
const elements = document.querySelectorAll(".your-css-selector");
if (elements.length > 0) {
  // At least one element exists with the specified selector
} else {
  // No matching elements found
}
console.log(document.querySelector(".your-css-selector"));
</script>
</body>
</html>





  <div id="footer" class="mt-auto fixed-bottom">
    <!-- Your footer content goes here -->
    <?php include('footer.php'); ?>
  </div>
</body>
</html>
<?php 
  } else {
    header("Location: login.php");
    exit();
  }
?>
