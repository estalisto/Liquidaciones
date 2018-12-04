<?php 
require_once('../class/Liquidacion.php');

$result = $liquidacion->obtieneListaAmbientes();
echo '<option value="0">Seleccionar Ambiente</option>';
if($result > 0){
    foreach($result as $fila): 
    {
        echo '<option value="'.$fila["ID"].'">'.$fila["DESCRIPCION"].'</option>';
    }
    endforeach;
}

$liquidacion->Disconnect();