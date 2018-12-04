<?php 
require_once('../class/User.php');
require_once('../database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor
if(isset($_POST['un']) && isset($_POST['pw']) ){
	$username = $_POST['un'];
	$password = $_POST['pw'];
        $amb      = $_POST['amb'];
	$password = md5($password);

	$result = $user->login($username, $password);
	$return['valid'] = false;
	if($result > 0){
		$return['valid'] = true;
		$return['url'] = "home.php";
                $session->setSession('User',$result["id_usuario"]);
                $session->setSession('Nombre',$result["nombre_usuario"]);
                $session->setSession('Amb', $amb);
                
                /*$session->setSession('User',$result["id_usuario"]);
                $session->setSession('Nombre',$result["nombre_usuario"]);*/
                /*$_SESSION['user_logged'] = $result['id_usuario'];*/
	}
	echo json_encode($return);

}//end isset

