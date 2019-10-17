<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
</body>
</html>
<?php

include("includes/header.php");

//Get username parameter from url
if(isset($_GET['username'])) {
    $username=$_GET['username'];
}
else {
    $username = $userLoggedIn; //If no username set in url, use user logged in instead
}

?>

<div class="main_column column" id="main_column">

<?php

$user_obj = new User($con, $username);

foreach($user_obj->getFollowerList() as $follower) {

    $follower_obj = new User($con, $follower);

    echo "<a href='$follower'>
            <img class='profilePicSmall' src='" . $follower_obj->getProfilePic() ."'>"
            . $follower_obj->getFirstAndLastName() .
        "</a>
        <br>";
}


?>

</div>
