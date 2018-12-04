<?php 
require_once('../class/Liquidacion.php');
if(isset($_POST['secuencia'])){
        $secuencia= $_POST['secuencia'];
        $planilla= $_POST['planilla'];
        $fechaInicio= $_POST['fechaInicio'];
        $fechaFin= $_POST['fechaFin'];
	$fiscalizadoEpam= strtoupper($_POST['fiscalizadoEpam']);
        $supervisorVeolia= strtoupper($_POST['supervisorVeolia']);
        $contrato= $_POST['contrato'];
        $contratista= strtoupper($_POST['contratista']);
        
        $resultado = $liquidacion->actualizaPlanilla($planilla,$fechaInicio,$fechaFin,$fiscalizadoEpam, $supervisorVeolia, $contrato,$contratista,$secuencia);
	$return['valid'] = false;
	if($resultado){
		$return['valid'] = true;
		$return['msg'] = 'Registro Actualizado con Exito!';
	}
        echo json_encode($return);
}//end isset
$liquidacion->Disconnect();