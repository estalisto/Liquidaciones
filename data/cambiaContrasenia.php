<?php
// require_once('../class/User.php');
//$toke=$_POST('token');
//$idUsuario= $_POST('$idUsuario');
$idUsuario = $_POST['idUsuario'];
$toke=$_POST['token'];
$return['valid']=true;
$return['mensaje']='123';
echo json_encode($return);