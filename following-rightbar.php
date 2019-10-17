<?php
if(isset($_GET['username'])) {
    $username=$_GET['username'];
}
else {
    $username = $userLoggedIn; //If no username set in url, use user logged in instead
}
$user_obj = new User($con, $username);
?>





<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Following</h3>
  </div>
  <div class="panel-body">
    <div class="list-group">
      <?php
foreach($user_obj->getFollowingList() as $following) {
  $following_obj = new User($con, $following);?>
      <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $following_obj->getFirstAndLastName() ?></a>
    </div>
  </div>
</div>
<?php
}


 ?>
