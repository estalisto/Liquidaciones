<?php
require_once('../class/Liquidacion.php');
require_once('../configuracion/configuracion.php');
require_once('../funcionesWS/funcionesConsulta.php');
require_once('../class/OrdenesWS.php');
require_once('../class/CredencialesWS.php');
require_once('../class/MetodosWS.php');
require_once('../class/InstanciaWS.php');

if(isset($_POST['idSecuencia'])){
    $idSecuencia = $_POST['idSecuencia'];
    $planilla    = $_POST['planilla'];
    $fechaInicio = $_POST['fechaInicio'];//'01-01-2017';//
    $fechaFin    = $_POST['fechaFin'];//'30-05-2018';//
    $contrato    = $_POST['contrato'];//22;//

  //  $DOCUMENT_ORIGIN ='';
    /**/

    $session = new Database();//session is at default constructor.
    $parametros = $session->getSession('Amb');
    $pos = strpos($parametros,'/');

    $idEmpresa = substr($parametros,$pos+1,1);  // bcd   1/1/1

    $parametros = substr($parametros,$pos+1);  // bcd   1/1/1
    $pos = strpos($parametros,'/');

    $idInstancia = substr($parametros,$pos+1,1);  // bcd   1/1

    $regCredencialesWS = $credencialesWS->obtieneIdCredencialWS($idEmpresa,$idInstancia);

    $idCredencialWS=$regCredencialesWS['id_credencial'];
    $idUsuarioWS=$regCredencialesWS['usuario'];
    $idContraseniaWS=$regCredencialesWS['contrasenia'];
    $instanciaWS=$regCredencialesWS['instancia'];
    $serviceName = $metodosWS->obtieneMetodoOrden($idCredencialWS,'ORDEN');
    $DOCUMENT_ORIGIN = CURSOROR;
    //$SERVICE_NAME = ORDEN; //$serviceName

    //echo $idCredencialWS.' - '.$idUsuarioWS.' - '.$idContraseniaWS.' - '.$instanciaWS.' - '.$serviceName['metodo'];

    $ip = $vinstanciaWS->obtieneIpInstanciaWS($idInstancia,$idEmpresa);
	//echo "Instacia: ".$idInstancia." Empresa: ".$idEmpresa;


    $params = array('INUREFTYPE' => 1,
                    'ISBXMLCONSULTA' => '<Info_OrderLiquida><Contrato>'.$contrato.'</Contrato><FechaDesde>'.$fechaInicio.'</FechaDesde><FechaHasta>'.$fechaFin.'</FechaHasta></Info_OrderLiquida>');

	libxml_disable_entity_loader(false);

    //$resultado = execute_ws($SERVICE_NAME, $params, $DOCUMENT_ORIGIN);
    $resultado = execute_ws($serviceName['metodo'], $params, $DOCUMENT_ORIGIN,$idUsuarioWS,$idContraseniaWS,$instanciaWS,$ip['ip']);

    $return['valid'] = false;

   if ($resultado){
	//eliminaOrdenesWS
        $ordenWS=$ordenesWS->obtieneOrdenesIdWS($idSecuencia);
        if ($ordenWS){
          $bandera=$ordenesWS->eliminaOrdenesWS($idSecuencia);
        }

        foreach($resultado as $valor):

                $Cab=$liquidacion->obtienePlanilla($idSecuencia);
                $Supervisor=$Cab['SUPERVSOR_VEOLIA'];
                $Fiscalizador=$Cab['FISCALIZADOR_EPAM'];
                $Contratista=$Cab['CONTRATISTA'];


                $saveType = $ordenesWS->insertarOrdenesWS($idEmpresa,$valor['ID_ORDEN'],$idSecuencia,$valor['ID_TRABAJO_SOLICITUD'],$planilla,$Contratista,
                $Supervisor,$Fiscalizador,$valor['DIRECCION'], $valor['TRABAJO_SOLICITUD'],
                date('Y-m-d H:i:s',strtotime(str_replace('/', '-',$valor['FECHA_SOLICITUD']))),
                $valor['SOLUCION_TECNICA'],
                date('Y-m-d H:i:s',strtotime(str_replace('/', '-',$valor['FECHA_SOLUCION_TECNICA']))),
                date('Y-m-d H:i:s',strtotime(str_replace('/', '-',$valor['FECHA_FINALIZACION'] ))));


            if($saveType){
             $return['valid'] = true;
             $return['msg'] = 'Registro Guardado con Exito!';
            }else {
             $return['valid'] = false;
             $return['msg'] = 'ERROR';
            }
        endforeach;
   }else{
      $return['valid'] = false;
      $return['msg'] = 'No existe informacion de la planilla a generar.';
   }

   $ordenesWS->Disconnect();
   $liquidacion->Disconnect();
   echo json_encode($return);
}
?>
