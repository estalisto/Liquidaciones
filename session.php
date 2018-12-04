<?php 
require_once('database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor

if(($session->getSession('User')=='')){
	$session->Disconnect();
	header('location: index.php');
}
