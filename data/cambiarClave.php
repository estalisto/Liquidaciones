<?php 
require_once('../class/User.php');
require_once('../database/Database.php');//start session at default constructor
//$session = new Database();//session is at default constructor
if(isset($_POST['un']) && isset($_POST['pw']) ){
	$username = $_POST['un'];
	$password = $_POST['pw'];
	$password = md5($password);

	$result = $user->login($username, $password);
	$return['valid'] = false;
	if($result > 0){
		$return['valid'] = true;
	}
	echo json_encode($return);

}//end isset

