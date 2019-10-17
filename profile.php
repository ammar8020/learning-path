
<?php
require("includes/header.php");

$message_obj = new Message($con, $userLoggedIn);

if(isset($_GET['profile_username'])) {
	$username = $_GET['profile_username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
	$user_array = mysqli_fetch_array($user_details_query);

	$num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
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
	</head>
	<body>
		<div class="container ">
				<?php require("profile_header.php") ?>
					<div class="row">
						<div class="col-md-3">
							<?php require("profile_rightnav.php") ?>
						</div>
						<div class="col-md-7 fix">


								<div class="posts_area"></div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>








<!-- Modal -->

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
