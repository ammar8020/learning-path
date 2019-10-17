<?php  
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<!DOCTYPE html>
<html>
<head>
  <title>Learning Paths</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/register.css">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Learning Path</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">About Us</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="register.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="log_email" id="email" tabindex="1" class="form-control" placeholder="Email" value="<?php 
											if(isset($_SESSION['log_email'])) {
												echo $_SESSION['log_email'];
											} 
										?>" required>
									</div>
									<div class="form-group">
										<input type="password" name="log_password" tabindex="2" class="form-control" placeholder="Password">
										<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
									</div>
				
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login_button" id="login_button" tabindex="4" class="form-control btn btn-login" value="Login">
											</div>
										</div>
									</div>
									
								</form>
								<form id="register-form" action="register.php" method="POST" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="reg_fname" id="reg_fname" tabindex="1" class="form-control" placeholder="First Name" value="<?php 
											if(isset($_SESSION['reg_fname'])) {
												echo $_SESSION['reg_fname'];
											} 
											?>" required>
										<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>

									</div>
									<div class="form-group">
										<input type="text" name="reg_lname" id="reg_lname" tabindex="1" class="form-control" placeholder="Last Name" value="<?php 
											if(isset($_SESSION['reg_lname'])) {
												echo $_SESSION['reg_lname'];
											} 
											?>" required>
										<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

									</div>
								
									<div class="form-group">
										<input type="email" name="reg_email" id="reg_email" tabindex="1" class="form-control" placeholder="Email" value="<?php 
											if(isset($_SESSION['reg_email'])) {
												echo $_SESSION['reg_email'];
											} 
											?>" required>

									</div>
									<div class="form-group">
										<input type="email" name="reg_email2" id="reg_email2" tabindex="1" class="form-control" placeholder="Confirm Email" value="<?php 
											if(isset($_SESSION['reg_email2'])) {
												echo $_SESSION['reg_email2'];
											} 
											?>" required>

									</div>
									<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
					else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>
					
									<div class="form-group">
										<input type="password" name="reg_password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="reg_password2" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register_button" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register">
											</div>
										</div>
										<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>Your account has been created! You can login to get started now!</span><br>"; ?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<footer class="footer">
    <div class="footer-bottom navbar-fixed-bottom">
        <div class="container">
            <p class="pull-left"> </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                	<li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/register.js"></script>
</html>
