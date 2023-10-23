<!doctype html>
<html lang="en">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery UI library -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

<!-- Include jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">

<?php include('header.php');?>
	           <title>User Details</title>
<body style="background-image: url('image/login.jpg'); background-size: cover;">
 
	   <?php 
			  if(isset($_GET['error'] ) && ($_GET['error'] == 1)  ){
		            echo '<div class="alert alert-danger text-center" role="alert"> User Details Not Registered  </div>';
			   }
				   ?>
				 <?php 
			  if(isset($_GET['er'] ) && ($_GET['er'] == 1)  ){ 
		            echo '<div class="alert alert-danger text-center" role="alert"> email already exists </div>';
			   } ?>
<section >
			   <div class="container">
			   <div class="row d-flex justify-content-center align-items-center h-100">
			   <div class="col col-xl-10">
			   <div class="card" style="border-radius: 1rem;">
			   <div class="card-body p-4 p-lg-5 text-black">
					<h3 class="text-center">Sign Up</h3>
<form action="post_user_details.php" method="POST">
	<div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">User Name</label>
                    <input type="text" name="name" id="firstName" placeholder="User Name (10 characters max)" class="form-control form-control-lg" maxlength="10" required>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
					<label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="ex:-abc@mail.com" class="form-control form-control-lg" required>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="col-md-6 mb-4">
						  <div class="form-outline">
						  <label class="form-label"  for="phoneNumber">Phone Number</label>
						  <input type="tel" name="contact" id="phoneNumber"  placeholder="Enter Mobile Number" class="form-control form-control-lg" required pattern="\d{10}" maxlength="10">
						</div>
						</div>
						
                
				<div class="col-md-6 mb-4">
                  <div class="form-outline">
			        <label class="mb-2 pb-1" for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your New Password" class="form-control form-control-lg" required>
                  </div>

                </div>
              </div>
				
            
              
                
                
					 <div class="row">
					  
						
						
						
						<div class="col-md-6 mb-4">
                  <h5 class="mb-2 pb-1" required>Gender: </h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grnder" id="femaleGender"
                      value="Female" checked />
                    <label class="form-check-label" name="grnder" for="femaleGender">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grnder" id="maleGender"
                      value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="grnder" id="otherGender"
                      value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                </div>
						
					  </div>
					</div>				
					
				  <div class="mt-4 pt-2">
				  <div class="d-flex justify-content-center">
					<input class="btn btn-primary btn-lg" type="submit" value="Submit" />
				  </div>
				</div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include('footer.php'); ?>


</body>	
</html>
