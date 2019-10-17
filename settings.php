<?php
include("includes/header.php");
include("includes/form_handlers/settings_handler.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<head>
		  <title>Learning Paths</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <link rel="stylesheet" href="css/styles0.css">
		  <link rel="stylesheet" href="css/horizontal_panel.css">
		</head>
	</head>
	<body>
		<div class="container ">
	    <div class="row">
	      <div class="col-md-3">
	        <div class="panel panel-default">
	          <div class="panel-heading">
	            <h3 class="panel-title">Settings</h3>
	          </div>
	          <div class="panel-body">
	            <div class="list-group">
	              <a href="Profile.html" class="list-group-item active">Account</a>

	            </div>
	          </div>
	        </div>
	      </div>

<?php $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($user_data_query);

$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email']; ?>

				<div class="col-md-5">
					<div class="container" >
						<form action="settings.php" method="post">
						<div class="row">
							<div class=" col-md-6 ">
								<div class="panel panel-default panel-horizontal">
									<div class="panel-heading">
										<h3 class="panel-title">First Name</h3>
									</div>
									<div class="panel-body">
										<ul>
											<li><input type="text" name="first_name" value="<?php echo $first_name ?>" placeholder="First Name"></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
	            <div class=" col-md-6 ">
	              <div class="panel panel-default panel-horizontal">
	                <div class="panel-heading">
	                  <h3 class="panel-title">Last Name</h3>
	                </div>
	                <div class="panel-body">
	                  <ul>
	                    <li><input type="text" name="last_name" value="<?php echo  $last_name ?>" placeholder="Second Name"></li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	          </div>
						<div class="row">
	            <div class=" col-md-6 ">
	              <div class="panel panel-default panel-horizontal">
	                <div class="panel-heading">
	                  <h3 class="panel-title">Email</h3>
	                </div>
	                <div class="panel-body">
	                  <ul>
	                    <li><input type="email" name="email" value="<?php echo $email ?>" placeholder="Email"></li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	          </div>
						<?php echo $message ?>
						<input type="submit" name="update_details" id="save_details" value="Update Details" class="info settings_submit">
					</form>
					<form action="settings.php" method="post">
						<div class="row">
	            <div class=" col-md-6 ">
	              <div class="panel panel-default panel-horizontal">
	                <div class="panel-heading">
	                  <h3 class="panel-title">Change Password</h3>
	                </div>

	              </div>
	            </div>
	          </div>
						<div class="row">
	            <div class=" col-md-6 ">
	              <div class="panel panel-default panel-horizontal">
	                <div class="panel-heading">
	                  <h3 class="panel-title">Old Password</h3>
	                </div>
	                <div class="panel-body">
	                  <ul>
	                    <li><input type="password" name="old_password" placeholder="old Password"></li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	          </div>
						<div class="row">
	            <div class=" col-md-6 ">
	              <div class="panel panel-default panel-horizontal">
	                <div class="panel-heading">
	                  <h3 class="panel-title">New Password</h3>
	                </div>
	                <div class="panel-body">
	                  <ul>
	                    <li><input type="password" name="new_password_1" placeholder="New Password"></li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class=" col-md-6 ">
	              <div class="panel panel-default panel-horizontal">
	                <div class="panel-heading">
	                  <h3 class="panel-title">Confirm Password</h3>
	                </div>
	                <div class="panel-body">
	                  <ul>
	                    <li><input type="password" name="new_password_2" placeholder="Confirm Password"></li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	          </div>
						<?php echo $password_message ?>
						<input type="submit" name="update_password" id="save_details" value="Update Password" class="info settings_submit">
					</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
