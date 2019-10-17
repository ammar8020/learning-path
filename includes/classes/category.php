<?php
class Category {
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

	public function getcategories() {
		$userLoggedIn = $this->user_obj->getUsername();
		$query = mysqli_query($this->con, "select * from categories");
		return ($query);
	}
}
?>
