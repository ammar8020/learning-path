<?php if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];

}
elseif (isset($_GET['id'])) {
  $username=$_GET['id'];
}
else {
  $username=$userLoggedIn;
}

if(isset($_POST['remove_friend'])) {
	$user = new User($con, $userLoggedIn);
	$user->removeFriend($username);
}

if(isset($_POST['add_friend'])) {
	$user = new User($con, $userLoggedIn);
	$user->sendRequest($username);
}
if(isset($_POST['respond_request'])) {
	header("Location: requests.php");
}

 ?>
<body style="padding-top:70px">
<div class="row" id="image_down">
  <div class="col-md-3">
      <img id="profile_image" class="img-circle" src="assets\images\profile_pics\defaults\head_alizarin.png" alt="User Profile">
    </div>
    <?php $Name_obj= new User($con, $username) ?>
    <div class="col-md-5">
      <ul id="margintop1">
        <li class="margin-button"id="usernameibm"><?php echo $Name_obj->getFirstAndLastName() ?></li>
        <li class="margin-button">Profile Credentials</li>
        <li class="margin-button" >Description</li>
        <li>

          <form action="<?php echo $username; ?>" method="POST">
       			<?php
       			$profile_user_obj = new User($con, $username);
       			if($profile_user_obj->isClosed()) {
       				header("Location: user_closed.php");
       			}

       			$logged_in_user_obj = new User($con, $userLoggedIn);

       			if($userLoggedIn != $username) {

       				if($logged_in_user_obj->isFriend($username)) {
       					echo '<input type="submit" name="remove_friend" class="danger" value="Unfollow"><br>';
       				}
       				else if ($logged_in_user_obj->didReceiveRequest($username)) {
       					echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br>';
       				}
       				else if ($logged_in_user_obj->didSendRequest($username)) {
       					echo '<input type="submit" name="" class="default" value="Request Sent"><br>';
       				}
       				else
       					echo '<input type="submit" name="add_friend" value="Follow"><br>';

       			}
            else {
              echo '<input type="submit" name="add_friend" class="success" value="Followers"><br>';
            }

       			?>
       		</form>

        </li>
      </ul>
    </div>
  </div>
</body>
