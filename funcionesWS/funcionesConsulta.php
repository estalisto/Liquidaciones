<?php
require_once('../configuracion/configuracion.php');
ini_set("soap.wsdl_cache_enabled", "0");


function execute_ws($service_name, $params, $document_origin,$usuario,$contrasenia,$instancia,$ip, $debug = false, $process = true){
	
	$METHOD_NAME = $service_name . '_WS';
	$ns = 'OpenSystems.WebServices.UI';
	//$WebService=RUTAW."{$service_name}.asmx?wsdl";
        $WebService=$ip."{$service_name}.asmx?wsdl";
	//Body of the Soap Header.
	$headerData = new stdClass();
	
	/*$headerData->User = base64_decode(USUARIOWS);
	$headerData->Password = base64_decode(CONTRASENIAWS);
	$headerData->Instance = base64_decode(INSTANCIAWS);*/
        $headerData->User = base64_decode($usuario);
	$headerData->Password = base64_decode($contrasenia);
	$headerData->Instance = base64_decode($instancia);
	//Create Soap Header.
	$header = new SOAPHeader($ns, 'AuthenticationHeader', $headerData);
	
	//, 'ISBNAME' => ''

	$service_options =  array(
	      "trace"      => ($debug) ? 1 : 0,		// enable trace to view what is happening
	      "exceptions" => 0,		// disable exceptions
	      "cache_wsdl" => WSDL_CACHE_NONE,
	      "soap_version" => SOAP_1_2,
		  'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
		  'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
		  'encoding'=>'ISO-8859-1'
	);

	//Invocación al web service
	$soap_client = new SoapClient($WebService, $service_options);
	
	//set the Headers of Soap Client.
	$soap_client->__setSoapHeaders($header);
	
	////recibimos la respuesta dentro de un objeto
	$result = $soap_client->$METHOD_NAME($params);
	if ($debug){
		print_r($result);
	}
	
	$mensaje_error = (isset($result->OSBMENSAJEERROR)) ? trim($result->OSBMENSAJEERROR) : '';
	
	if ($mensaje_error != '' and $mensaje_error !='-'){
		error_log("INTERAGUA WS: " . $mensaje_error);
		return array('');
	}
	$MENSAJEERROR=MENSAJEERROR;
	if ($document_origin == ""){
		return $result;
	} else {
		if (isset($result->$document_origin->any)){
			$data = $result->$document_origin->any;
                        $process == true;
		} else {
                    $process == false;
                    if ($result->$MENSAJEERROR!==null){
                       // $data=$result->$MENSAJEERROR;
                        $data = utf8_encode(str_replace("<?xml version = '1.0' encoding='ISO-8859-15'?>", '', $result->$MENSAJEERROR));
                    }
		}
	}
	
	if ($process == true){
		return process_xml_ia($data, $document_origin, $debug);
	}
		
	return $data;
}


function process_xml_ia($data, $document_origin, $debug = false, $reencode = false){
	
	// Remove namespaces
    $xml    = str_replace(array('<?xml version="1.0" encoding="UTF-8"?>', "diffgr:","msdata:"),'', $data);
	
	if ($reencode){
		$xml = utf8_encode( $xml );
	}
	
    // Wrap into root element to make it standard XML
    $xml    = "<?xml version='1.0' encoding='UTF-8'?><package>". $xml."</package>";
	
	if ($debug){
		print_r($xml);
	}
	
    // Parse with SimpleXML - probably there're much better ways
    $data   = simplexml_load_string($xml);
	
	$datos = $data->xpath('//' . $document_origin);
	
	//$obj_arr = get_object_vars($datos[0]);
	
	if ($debug){
		print_r($datos);
	}
	
	$respuesta = array();

	foreach($datos as $indice => $dato){
		$obj_arr = get_object_vars($dato);
		foreach($obj_arr as $id => $value){
			if ($id == '@attributes') continue;
			
			$respuesta[$indice][$id] = $value;
			//echo "{$id} = {$value} \n";
		}
	}
	
	// Si sólo devuelve un elemento, retorna el original
	//if (count($respuesta) == 1){
	//	$respuesta = $respuesta[0];
	//}
	
	if ($debug){
		print_r($respuesta);
	}
	
	return $respuesta;
}