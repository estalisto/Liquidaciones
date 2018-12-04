<?php
require_once('../class/Liquidacion.php');
require_once('../database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor.
$empresa = $session->getSession('Amb');
$pos = strpos($empresa,'/');
$empresa = substr($empresa,$pos+1,1);  // bcd   1/1/1

$dataPlanillas= $_POST['data'];
    foreach($dataPlanillas as $dato){
        $guardaRegistro = $liquidacion->insertaPlanillas($empresa,$dato['txtPlanillaD'],$dato['txtFechaInicioD'],$dato['txtFechaFinD'],strtoupper($dato['txtContratistaD']),strtoupper($dato['txtFiscEpamD']),strtoupper($dato['txtSuperVeoliaD']),$dato['txtContratoD'],'A');
    } 

//$saveType = $rubros->insertaRubros($idActa,$idItem,$tipoItem,$descrip,$obs,$porcen,$valorUnitario,$total,$cantidad,$unidad,$tipoEjecucion);
$return['valid'] = false;

if($guardaRegistro){
 $return['valid'] = true;
 $return['msg'] = 'Registro Guardado con Exito!';
}
//$return['msg'] = 'Registro Guardado con Exito!';
echo json_encode($return);  
$liquidacion->Disconnect();