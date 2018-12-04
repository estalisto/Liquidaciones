<?php 
require_once('../class/Liquidacion.php');
if(isset($_POST['planilla'])){
        $planilla= $_POST['planilla'];
        $fechaInicio= $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $contrato = $_POST['contrato'];	
        $resultado = $liquidacion->verificaPlanillaRepetida($planilla,$fechaInicio,$fechaFin,$contrato);
        /*$return['valid'] = false;
	if($resultado){
		$return['valid'] = true;
		$return['msg'] = 'Edit Successfully!';
	} else{
            $return['msg'] = 'Acta no existe';
        }*/
        echo json_encode($resultado);
}//end isset
$liquidacion->Disconnect();