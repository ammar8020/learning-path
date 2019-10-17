<?php

	$post_obj=new Post($con,$userLoggedIn);
	$get_posts=$post_obj->trendingpost();
	 ?>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Trending</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
<?php while ($subject=mysqli_fetch_assoc($get_posts)) {  ?>
      <a href="#" class="list-group-item"><?php echo $subject["title"]; ?></a>
			<?php }?>
    </div>
  </div>
</div>
