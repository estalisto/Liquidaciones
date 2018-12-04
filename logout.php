<?php 
require_once('database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor

$session->Disconnect();
session_destroy();

header('location: index.php');
