<?php 
require_once('../class/User.php');
require_once('../configuracion/configuracion.php');
// require_once('../database/Database.php');//start session at default constructor
//$session = new Database();//session is at default constructor
if(isset($_POST['email'])){
	$email = $_POST['email'];

	$result = $user->email($email);
	$return['valid'] = false;
    try{    
	if($result > 0){
            $return['valid'] = true;
            $return['url'] = $_SERVER["SERVER_NAME"];
            $idUsuario=$result["id_usuario"];
            $nombre=$result["nombre_usuario"];
            $token=$idUsuario.$nombre.rand(1,9999999).date('Y-m-d');
            $token = md5($token);
            $saveType = $user->inserta_am_recupera_pass($idUsuario,$nombre,$token);
            $return['valid'] = false;
            if($saveType){
                $return['valid'] = true;
                $enlace = RUTA.'restablecer.php?idUsuario='.md5($idUsuario).'&token='.$token;
                $mensaje = '<html>
                                <head>
                                   <title>Restablece tu contraseña</title>
                                </head>
                                <body>
                                  <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
                                  <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
                                  <p><b>Usuario: </b>"'.$idUsuario.'"</p> 
                                  <p>
                                    <strong>Enlace para restablecer tu contraseña</strong><br>
                                    <a href="'.$enlace.'"> Restablecer contraseña </a>
                                  </p>
                                </body>
                               </html>';

                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $cabeceras .= 'From: administracion <administrador@veolia.com>' . "\r\n";
                // Se envia el correo al usuario
                mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
                $return['OK']='Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña';
                $return['mensaje']='<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
            }else {
                $return['mensaje'] = '<div class="alert alert-warning"> Error en el envio del correo </div>';
            }
        }else{
            $return['mensaje'] = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
        }
    }catch( Exception $e){
        $return['mensaje'] = '<div class="alert alert-warning">'.'Excepción capturada: '.$e -> getMessage ().' </div>';
        $return['valid'] = false;
    } finally {
        echo json_encode($return);
    } 

}

$user->Disconnect();