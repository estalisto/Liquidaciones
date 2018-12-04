<?php 
require_once('../class/User.php');
require_once('../configuracion/configuracion.php');
// require_once('../database/Database.php');//start session at default constructor
//$session = new Database();//session is at default constructor
  
if(isset($_POST['token']) && isset($_POST['idUsuario']) && isset($_POST['clave']) ){
	 $token = $_POST['token'];
         $idUsuario = $_POST['idUsuario'];
         $clave = $_POST['clave'];
         $clave = md5($clave);
          
	$result = $user->obtieneCredenciales($token);
	$return['valid'] = true;
        //$result = 20;
  
	if($result > 0){
            $return['valid'] = true;            
           if (md5($result["idUsuario"]) === $idUsuario){
                $res = $user->change_pass($clave,$result["idUsuario"]);
                $return['valid'] = false;
                if($res){
                    $return['valid'] = true;
                    $return['url'] = "index.php";
                    $return['mensaje'] = 'Contraseña cambiada satisfactoriamente!';
                }
                else{
                    $return['valid'] = false;
                    $return['mensaje'] = 'Error al mamento de actualizar contraseña!';
                }
            }
            else
            {
              $return['valid'] = false;  
              $return['mensaje'] = 'Credenciales del usuario incorrectas';
            }
            
            }else{
            $return['mensaje'] = 'No existe informacion para las credenciale enviadas';
            }
        echo json_encode($return);
    
}

$user->Disconnect();