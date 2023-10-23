<?php
if (isset($_SESSION['tasks']) && count($_SESSION['tasks']) > 0) {
    foreach ($_SESSION['tasks'] as $task) {
        echo '<li class="list-group-item">' . $task . '</li>';
    }
}
?>