<?php
require("includes/header.php");


if(isset($_POST['post'])){

	$uploadOk = 1;
	$imageName = $_FILES['fileToUpload']['name'];
	$errorMessage = "";
	$category_select=$_POST['cat_select'];

	if($imageName != "") {
		$targetDir = "assets/images/posts/";
		$imageName = $targetDir . uniqid() . basename($imageName);
		$imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

		if($_FILES['fileToUpload']['size'] > 10000000) {
			$errorMessage = "Sorry your file is too large";
			$uploadOk = 0;
		}


		if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
			$errorMessage = "Sorry, only jpeg, jpg and png files are allowed";
			$uploadOk = 0;
		}

		if($uploadOk) {
			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
				//image uploaded okay
			}
			else {
				//image did not upload
				$uploadOk = 0;
			}
		}

	}

	if($uploadOk) {
		$post = new Post($con, $userLoggedIn);
		$post->submitPost($_POST['post_text'], 'none', $imageName, $category_select);
	}
	else {
		echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage
			</div>";
	}

}



 ?>
<body style="padding-top:70px">

<div class="container">
	<div class="row">
		<div class="col-md-3">


				<?php require("trending.php") ?>
				<?php require("suggested.php") ?>
		</div>




		<div class="col-md-7 fix">


			<div class="panel panel-primary">

				<div class="panel-body" style="background-color:#E8F5FD; height:150px; border">
					<form class="post_form" action="index.php" method="POST" enctype="multipart/form-data">

						<textarea name="post_text" id="post_text" style="width:100%; " placeholder="Got something to say?"></textarea>
						<div class="row">
							<div class="col-md-3">
								<!-- fileToUpload -->
								<label for="file-upload" class="custom-file-upload">
    							<i class="fa fa-cloud-upload"></i>  Upload
								</label>
								<input id="file-upload" name="fileToUpload"type="file">
							</div>
							<div class="col-md-2">
								<?php
								$cat = new category($con, $userLoggedIn);
								$num_categories = $cat->getcategories();

								?>


								<select name="cat_select" style="margin-top:30px;">
									<?php while($subject=mysqli_fetch_assoc($num_categories))
									{?>
  							<option value=<?php echo $subject['id'] ?>><?php echo $subject['name'] ?></option>
						<?php	}?>
							</select>
							</div>
							<div class="col-md-4">
								<input type="submit" name="post" id="post_button" value="Post">

							</div>
							<div class="col-md-">

							</div>

						</div>

					</form>

				</div>


			</div>




				<div class="posts_area"></div>



		</div>
		<div class="col-md-2">
			<?php require("following-rightbar.php") ?>
		</div>
</div>
</div>
</body>
<script>
var userLoggedIn = '<?php echo $userLoggedIn; ?>';

$(document).ready(function() {

	$('#loading').show();

	//Original ajax request for loading first posts
	$.ajax({
		url: "includes/handlers/ajax_load_posts.php",
		type: "POST",
		data: "page=1&userLoggedIn=" + userLoggedIn,
		cache:false,

		success: function(data) {
			$('#loading').hide();
			$('.posts_area').html(data);
		}
	});

	$(window).scroll(function() {
	//$('#load_more').on("click", function() {

		var height = $('.posts_area').height(); //Div containing posts
		var scroll_top = $(this).scrollTop();
		var page = $('.posts_area').find('.nextPage').val();
		var noMorePosts = $('.posts_area').find('.noMorePosts').val();

		if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
		//if (noMorePosts == 'false') {
			$('#loading').show();

			var ajaxReq = $.ajax({
				url: "includes/handlers/ajax_load_posts.php",
				type: "POST",
				data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
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

</body>
</html>
