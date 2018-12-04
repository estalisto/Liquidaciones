<!DOCTYPE html>
<html>
<head>
 <!--  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Veolia System</title>
  <link rel="shortcut icon" href="dist/img/veolia.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Grafico -->
  <script type="text/javascript" src="assets/js/loader.js"></script>
  <!-- datatable -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  
  <style>
    tr:hover td{background:#EDEDA0;}
    body:not(.modal-open){padding-right: 0px !important;} 
    #WindowLoad
        {
            position:fixed;
            top:0px;
            left:0px;
            z-index:3200;
            filter:alpha(opacity=65);
           -moz-opacity:65;
            opacity:0.65;
            background:#999;
        }
  </style>
  

    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper" id="principal">
 <?php
  error_reporting(E_ALL ^ E_NOTICE);
  require_once('database/Database.php');//start session at default constructor
  $session = new Database();//session is at default   
  $usuario=$session->getSession('Nombre');
  if($usuario == ''){
      $session->Disconnect();
      header('location: index.php');
}else{
    $id_usuario=$session->getSession('User'); 
}
  /*//session_start();
  if ($_SESSION['user_logged'] == '') 
     header('location: index.php');*/

   /* setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
    $d = "2010-03-09";
    $fecha = strftime("%d de %B de %Y", strtotime($d));*/

   date_default_timezone_set('America/Lima');
   setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
   $f= date("Y-m-d"); 
   $fecha = strftime("%d de %B de %Y", strtotime($f));
 
 

?>
  <header class="main-header">
    <!-- Logo -->
    <a href="/Liquidaciones/home.php" class="logo" style="align-content: center">
      <span class="logo-mini " >
          <img src="dist/img/veolia_min.png" class="img-responsive">
      </span>
            <!--<img src="dist/img/veolia2.png"  width="150" height="50" class="img-responsive "> -->
            <img src="dist/img/veolia1.png"  class="img-responsive "> 
     
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <!-- <label class="content-header center" style="align-content: center"  >E M P R E S A   P U B L I C A   D E   A G U A S   M A N T A</label>
      
      -->
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/veolia_min.png" class="user-image img-circle" alt="User Image">
              <span class="hidden-xs"><?php echo $usuario; ?></span>
		<input type="hidden" id="usuarioSession" value="<?php echo $id_usuario; ?>" />
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/veolia_min.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $usuario; ?>
                  <small><?php echo $fecha; ?></small>
                </p>
              </li>
              <!-- Menu Body class="btn btn-default btn-flat" -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                  <div class="pull-right">
                  <a href="logout.php" ><i class="fa fa-sign-out text-blue"></i>
                      <span>Salir</span>               
                  
                  </a>
                </div>
                <div class="pull-left">
                  <a id="changePass" href="cambiarContrasenia.php"><i class="fa fa-key text-blue"></i> 
		  <span>Cambiar contraseña</span></a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <?php include_once('navigation.php'); ?>