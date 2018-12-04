<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ingreso Al Sistema</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
       	.mi-input::placeholder { color: #21618c  ; font-weight: bold; }
  </style>
</head>
<body background ='dist/img/fondo.jpg' >
    <?php
     $token = $_GET['token'];
     $idUsuario = $_GET['idUsuario'];
    ?>
    
    <br>
    <section class="container">
        
        <center><img style="width: 550px;"  src = "dist/img/principal.png"> 
       </center>
        <h1 align="center" style="color: #21618c ;" ><FONT SIZE=20><FONT FACE="Times New Roman">Liquidaciones</FONT></FONT></h1>
       <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 ">
           
     <form id="formRecuperaClave"  method="post">
         
      <div class="form-group has-feedback">  
                        <input type="password" id="contrasenia" class="form-control mi-input" placeholder="Nueva contraseña..." required style="background-color:transparent; ">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <div id="valida1"> 
                             <!--<b><input id="texto" style=" height: 16px; font-size: 14px; background: transparent; border:none" value=""></b>-->
                            <span class="col-xs-4"  style="background: red; color:#ffffff; height: 12px; font-size: 10px">Insegura</span>
                            <span class="col-xs-4" style="background: orange; color:#ffffff ; height: 12px; font-size: 10px ">Segura</span>
                            <span class="col-xs-4" style="background: #2f8249; color:  #ffffff ;height: 12px; font-size: 10px">Muy segura</span>
                       </div>
                    </div> 
                    
                    <div class="form-group has-feedback">
                        <input type="password" id="repcontrasenia" class="form-control mi-input" placeholder="Confirmar contraseña..." required  style="background-color:transparent;  ">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <div id="valida2">  
                         <!--   <b><input id="texto1" style=" height: 16px; font-size: 14px; background: transparent; border:none" value=""></b> -->
                        <span class="col-xs-4"  style="background: red; color:#ffffff; height: 12px; font-size: 10px">Insegura</span>
                        <span class="col-xs-4" style="background: orange; color:#ffffff ; height: 12px; font-size: 10px ">Segura</span>
                        <span class="col-xs-4" style="background: #2f8249; color:  #ffffff ;height: 12px; font-size: 10px">Muy segura</span>
                       
                       </div>
                    </div>
                    
                    
                    
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" id="btnRestaurar" class="btn btn-primary btn-block btn-flat">Recuperar Contraseña</button>
                            <div class="social-auth-links">
                            <p> <a href="index.php">Regresar a la pantalla principal</a></p>
                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div id="msg_info">
                        <h4>La contraseña segura debe cumplir con lo siguientes estándares</h4>
                        <ul>
                           <li id="letter">Tener<strong> mas de 8 carácteres</strong></li>
                           <li id="capital">Tener <strong>una letra </strong></li>
                           <li id="length">Tener <strong>un letra Mayúscula</strong></li>
                           <li id="number">Tener <strong>un número</strong></li>
                        </ul>
                     </div>
                            
         <input type="hidden" name="" id="token" value="<?php echo $token ?>">
         <input type="hidden" name="" id="idUsuario" value="<?php echo $idUsuario ?>">
</form>
    <div id="mensaje"></div>

  </div>
 
  <!-- /.login-box-body -->

        </section>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="assets/js/recuperarClave.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<?php include_once('modal/msg.php'); ?>
</body>
</html>

