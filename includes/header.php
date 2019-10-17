<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Notification.php");
include("includes/classes/category.php");


if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Learning Paths</title>

	<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/demo.js"></script>
	<script src="assets/js/jquery.jcrop.js"></script>
	<script src="assets/js/jcrop_bits.js"></script>


	<!-- CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/drop_down.css"> -->
</head>

	<!-- <div class="container"> -->


		<?php
			//Unread messages
			$messages = new Message($con, $userLoggedIn);
			$num_messages = $messages->getUnreadNumber();

			//Unread notifications
			$notifications = new Notification($con, $userLoggedIn);
			$num_notifications = $notifications->getUnreadNumber();

			//Unread notifications
			$user_obj = new User($con, $userLoggedIn);
			$num_requests = $user_obj->getNumberOfFriendRequests();

			//getting cateogies
			$cat = new category($con, $userLoggedIn);
			$num_categories = $cat->getcategories();
		?>
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">



			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Learning Path</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php while($subject=mysqli_fetch_assoc($num_categories))
							{?>
								<li><a href="category.php?id=<?php echo $subject['id'] ?>"><?php echo $subject['name'] ?></a> </li>
						<?php	} ?>
						</ul>
					</li>
					<li>
						<div class="search" style="margin-top:15px;">

							<form action="search.php" method="GET" name="search_form">
								<input type="text" onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn; ?>')" name="q" placeholder="Search..." autocomplete="off" id="search_text_input">

								<div class="button_holder">
									<img src="assets/images/icons/magnifying_glass.png">
								</div>

							</form>

						</div>


				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right "style="z-index:999999;">

					<li><a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')">
						<i class="fa fa-envelope fa-lg"></i>
						<?php
						if($num_messages > 0)
						 echo '<span class="notification_badge" id="unread_message">' . $num_messages . '</span>';
						?>
					</a></li>
					<li><a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')">
						<i class="fa fa-bell fa-lg"></i>
						<?php
						if($num_notifications > 0)
						 echo '<span class="notification_badge" id="unread_notification">' . $num_notifications . '</span>';
						?>
					</a></li>
					<li><a href="requests.php">
						<i class="fa fa-users fa-lg"></i>
						<?php
						if($num_requests > 0)
						 echo '<span class="notification_badge" id="unread_requests">' . $num_requests . '</span>';
						?>
					</a></li>


					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user['first_name']; ?></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $userLoggedIn; ?>">Profile</a></li>
							<li><a href="settings.php">Settings</a></li>
							<li><a href="includes/handlers/logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>




		<div class="dropdown_data_window" style="height:0px; border:none; margin-top:30px"></div>
		<input type="hidden" id="dropdown_data_type" value="">


</nav>
<div class="search_results">

</div>
<div class="search_results_footer_empty">
</div>
	<!-- </div> -->

	</html>
