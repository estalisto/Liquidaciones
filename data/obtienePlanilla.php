<?php 
require_once('../class/Liquidacion.php');
if(isset($_POST['idnSecuencia'])){
	$idSecuencia = $_POST['idnSecuencia'];

	$typeResult = $liquidacion->obtienePlanilla($idSecuencia);
	echo json_encode($typeResult);
}//end isset

$liquidacion->Disconnect();
 