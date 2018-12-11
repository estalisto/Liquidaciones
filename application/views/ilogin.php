<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Veolia System</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>dist/img/veolia.ico" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/square/blue.css">

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
<body background ='<?php echo base_url();?>dist/img/fondo.jpg' >
<br>
<section class = "container" >
    <center><img style = "width: 550px;" src = "<?php echo base_url();?>dist/img/principal.png">
    </center>
    <h1 align = "center" style = "color: #21618c ;" ><FONT SIZE = 20><FONT FACE = "Times New Roman">Liquidaciones</FONT></FONT></h1>
    <div class = "col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 ">

        <br>
        <form method = "post" id = "form-login">
            <div background= rgba(255,0,0,0.5) >
               
                <div class = "form-group has-feedback">
                    <input type = "text" id = "username" class = "form-control mi-input" placeholder = "Usuario..." required style = "background-color:transparent; ">
                    <span class = "glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class = "form-group has-feedback">
                    <input type = "password" id = "password" class = "form-control mi-input" placeholder = "Contraseña..." required style = "background-color:transparent;">
                    <span class = "glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class = "form-group has-feedback">
                    <div class="selector-ambiente">
                        <select class="form-control mi-input" id="idAmbiente" style = "background-color:transparent; width: 100%; color: #21618c  ; font-weight: bold;">
                     <?php    
                        $opciones="<option value=\"0\">Seleccione</option>";              
                        foreach($isntancias as $am){                            
                            $opciones.="<option value=\"1/1/1\">".$am->codigo."/".$am->descripcion."</option>";                            
                        } 
                        echo $opciones;
                     ;?>
                     </select>
                    </div>
                </div>

                <div class = "row">

                    <!--/.col -->
                    <div class = "col-xs-12">
                        <button type = "submit" class = "btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                    <!--/.col -->
                </div>
            </div>
        </form>

        <div class = "social-auth-links text-center">
            <p>Olvidaste tu contraseña? <a href = "recuperaClave.php">Click aquí para recuperarla.</a>.</p>
        </div>
    </div>

    <!--/.login-box-body -->

</section>

<!--/.login-box -->

<!--jQuery 2.2.3 -->
<script src = "<?php echo base_url();?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>plugins/iCheck/icheck.min.js"></script>




</body>
</html>

