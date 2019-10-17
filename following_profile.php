
<?php
require("includes/header.php");

$message_obj = new Message($con, $userLoggedIn);

// if(isset($_GET['profile_username'])) {
// 	$username = $_GET['profile_username'];
// 	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
// 	$user_array = mysqli_fetch_array($user_details_query);
//
// 	$num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
// }



if(isset($_GET['remove_friend'])) {
	$user = new User($con, $userLoggedIn);
	$user->removeFriend($username);
}

if(isset($_GET['add_friend'])) {
	$user = new User($con, $userLoggedIn);
	$user->sendRequest($username);
}
if(isset($_GET['respond_request'])) {
	header("Location: requests.php");
}

if(isset($_POST['post_message'])) {
  if(isset($_POST['message_body'])) {
    $body = mysqli_real_escape_string($con, $_POST['message_body']);
    $date = date("Y-m-d H:i:s");
    $message_obj->sendMessage($username, $body, $date);
  }

  $link = '#profileTabs a[href="#messages_div"]';
  echo "<script>
          $(function() {
              $('" . $link ."').tab('show');
          });
        </script>";


}

 ?>







<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="assets/css/profile.css">
		<style media="screen">

		</style>
	</head>
	<body>
		<div class="container ">
				<?php require("profile_header.php") ?>
					<div class="row">
						<div class="col-md-3">
							<?php require("profile_rightnav.php") ?>
						</div>
						<div class="col-md-7">
							<div style="margin-left:20px;">


			            <!--Users List column 1-->

									<?php
									if(isset($_GET['username'])) {
								      $username=$_GET['username'];
								  }
								  else {
								      $username = $userLoggedIn; //If no username set in url, use user logged in instead
								  }

								  $user_obj = new User($con, $username);
									foreach($user_obj->getFollowingList() as $follower) {
										$following_obj = new User($con, $follower);
										$curruser=$following_obj->getFirstAndLastName();
										if (isset($curruser)) {

									?>
									<div class="col-md-5">
			            <div class="row margin-button">
			            </div><div class="row margin-button">
			              <div class="col-md-12 " id="styletype">
			                <li class="margin-button">
			                  <img class="img-circle" id="user_image" id=" marginright" src="assets\images\profile_pics\defaults\head_alizarin.png" alt="">

												<Strong><?php echo $curruser ?></strong>
			                </li>
			                <li class="margin-button"><?php echo $following_obj->getMutualFriends($curruser);?> Mutual Followers</li>
											<li class="margin-button"><?php echo $following_obj->isFriend($curruser);?></li>
											<button type="button" class="btn btn-default">Following <span class="badge badge-light"><?php echo $following_obj->getNumFollowers(); ?></span></button>

										<!-- <form action="following_profile.php" method="GET">

											<input class="btn-btn-default" type="submit" name="remove_friend" class="danger" value="Following"> -->
											<?php




									      // if($opt>0) {
									      //   echo '<input type="submit" name="remove_friend" class="danger" value="Following"><br>';
									      // }
									      // else if ($user_obj->didReceiveRequest($username)) {
									      //   echo '<input type="submit" name="respond_request" class="warning" value="Respond to Request"><br>';
									      // }
									      // else if ($user_obj->didSendRequest($username)) {
									      //   echo '<input type="submit" name="" class="default" value="Request Sent"><br>';
									      // }
									      // else
									      //   echo '<input type="submit" name="add_friend" class="success" value="Follow"><br>';


											?>


			              </div>
			            </div> </div>
								<?php } }?>
							</div>

			        </div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>









      <script>
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            var div = document.getElementById("scroll_messages");
            div.scrollTop = div.scrollHeight;
        });
      </script>
    </div>


  </div>


</div>

<!-- Modal -->
<div class="modal fade" id="post_form" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="postModalLabel">Post something!</h4>
    </div>

    <div class="modal-body">
      <p>This will appear on the user's profile page and also their newsfeed for your friends to see!</p>

      <form class="profile_post" action="" method="POST">
        <div class="form-group">
          <textarea class="form-control" name="post_body"></textarea>
          <input type="hidden" name="user_from" value="<?php echo $userLoggedIn; ?>">
          <input type="hidden" name="user_to" value="<?php echo $username; ?>">
        </div>
      </form>
    </div>


    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" name="post_button" id="submit_profile_post">Post</button>
    </div>
  </div>
</div>
</div>


<script>
var userLoggedIn = '<?php echo $userLoggedIn; ?>';
var profileUsername = '<?php echo $username; ?>';

$(document).ready(function() {

  $('#loading').show();

  //Original ajax request for loading first posts
  $.ajax({
    url: "includes/handlers/ajax_load_profile_posts.php",
    type: "POST",
    data: "page=1&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
    cache:false,

    success: function(data) {
      $('#loading').hide();
      $('.posts_area').html(data);
    }
  });

  $(window).scroll(function() {
    var height = $('.posts_area').height(); //Div containing posts
    var scroll_top = $(this).scrollTop();
    var page = $('.posts_area').find('.nextPage').val();
    var noMorePosts = $('.posts_area').find('.noMorePosts').val();

    if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
      $('#loading').show();

      var ajaxReq = $.ajax({
        url: "includes/handlers/ajax_load_profile_posts.php",
        type: "POST",
        data: "page=" + page + "&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
        cache:false,

        success: function(response) {
          $('.posts_area').find('.nextPage').remove(); //Removes current .nextpage
          $('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage
          $('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage

          $('#loading').hide();
          $('.posts_area').append(response);

        }
      });

    } //End if

    return false;

  }); //End (window).scroll(function())


});

</script>















	</div>
</body>
</html>
