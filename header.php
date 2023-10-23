<?php  
include('db.php'); 
$object = new database();



      include('head.php'); ?>
<style>


</style>
<div id="header">
    <header class="bg-white text-white">
        <div class="m-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="home.php">
                        <img class="navbar-brand" src="image/logo.jpg" width="50" height="50" />
                    </a>

                    <h3 class="text-dark nav-item nav-link active" style="white-space: nowrap;">Guyal</h3>
		
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="index.php" class="nav-item nav-link active"></a>

                            <div class="row align-items col-md-2">
                                <div class="navbar-nav ms-auto">
                                    <?php
                                    // Check if the user is logged in
                                    if (isset($_SESSION['username'])) {
                                        $username = $_SESSION['username'];

                                        $query = "SELECT userName FROM user WHERE email_id = '$username'";
										
                                        $result = mysqli_query($object->dbConnection(), $query);
										
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $userName = $row['userName'];
                                    ?>                                           
                                    <div class="btn-group" style="margin-left: 950px;">
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" style="white-space: nowrap;">
        Welcome <?php echo $row['userName']; 
		?>
    </button>
    <div class="dropdown-menu dropdown-menu-left" style="margin-top: 10px;">
        <a class="dropdown-item" href="logout.php">Log out</a>
    </div>
</div>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
