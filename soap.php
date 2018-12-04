<?php
ini_set('display_errors', true);
ini_set("soap.wsdl_cache_enabled", "0");
error_reporting(E_ALL);
libxml_disable_entity_loader(false);
$url = "http://des-opapp/OpenSmartflexWebAAVM/UI/OS_IA_GETDETALLEORDERLIQUIDA.asmx?WSDL";
$soap = new soapClient($url, array('encoding'=>'UTF-8'));
$idOrden= 146291;
$return = $soap->MethodFromWebService(array('INUORDERID' => $idOrden));
?>