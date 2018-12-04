<?php 
require_once('../class/User.php');
require_once('../configuracion/configuracion.php');
// require_once('../database/Database.php');//start session at default constructor
//$session = new Database();//session is at default constructor
  
if(isset($_POST['idUsuario']) && isset($_POST['clave']) ){
        $idUsuario = $_POST['idUsuario'];
        $clave = $_POST['clave'];
        $clave = md5($clave);
         
        $res = $user->change_pass($clave,$idUsuario);
        $return['valid'] = false;
        if($res){
            $return['valid'] = true;
            $return['url'] = "home.php";
            $return['mensaje'] = 'Contraseña cambiada satisfactoriamente!';
        }
        else{
            $return['valid'] = false;
            $return['mensaje'] = 'Error al mamento de actualizar contraseña!';
        }
         
         
           
        echo json_encode($return);
    
}

$user->Disconnect();