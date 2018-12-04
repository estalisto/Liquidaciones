<?php 
require_once('../class/Liquidacion.php');
if(isset($_POST['idSecuencia'])){
        $idSecuencia= $_POST['idSecuencia'];
	
        $resultado = $liquidacion->obtieneListaPlanillasId($idSecuencia);

        echo json_encode($resultado);
}
$liquidacion->Disconnect();