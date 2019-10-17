<?php
getFollowers(){
  if(isset($_GET['username'])) {
      $username=$_GET['username'];
  }
  else {
      $username = $userLoggedIn; //If no username set in url, use user logged in instead
  }


  $user_obj = new User($con, $username);

  foreach($user_obj->getFollowerList() as $follower) {

      $follower_obj = new User($con, $follower);

    return $follower_obj;
  }


  ?>
}
 ?>
