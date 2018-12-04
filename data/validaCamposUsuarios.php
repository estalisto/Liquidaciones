<?php

require_once('../class/User.php');

//if (isset($_POST['cedula']) && isset($_POST['correo']) && isset($_POST['codigoUsuario']) && isset($_POST['usuario'])) {

    $identificacion = $_POST['cedula'];
    $idEmpleado = $_POST['codigoUsuario'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];

    $result = $user->validaCamposUsuarios($identificacion, NULL, NULL, NULL);
    $return['valid'] = false;
    if ($result > 0) {
        $return['valid'] = true;
    }
    echo json_encode($return);
    
//}//end isset

