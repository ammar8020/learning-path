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

foreach($user_obj->getFollowingList() as $following) {
    
    $following_obj = new User($con, $following);

    echo "<a href='$following'>
            <img class='profilePicSmall' src='" . $following_obj->getProfilePic() ."'>"
            . $following_obj->getFirstAndLastName() .
        "</a>
        <br>";
}
?>

</div>