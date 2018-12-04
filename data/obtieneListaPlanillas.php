<?php 
require_once('../class/Liquidacion.php');

$result = $liquidacion->obtieneListaPlanillas();
echo '<option value="0">Seleccionar Planilla</option>';
if($result > 0){
    foreach($result as $fila): 
    {
        echo '<option value="'.$fila["SECUENCIA"].'">'.$fila["PLANILLA"]." - ".$fila["FECHA_INICIO"]." - ".$fila["FECHA_FIN"]." - ".$fila["CONTRATO"].'</option>';
    }
    endforeach;
}

$liquidacion->Disconnect();