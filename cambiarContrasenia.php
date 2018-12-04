<?php include("barras/cabecera.php"); ?>    
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script type="text/javascript" src="assets/js/loader.js">-->

<div class="content-wrapper">
    <section class="content-header">
       

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">

         <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
             <form id="formCambiaClave"  method="post">
         
                  <div class="form-group has-feedback">  
                      <label> <center><h1>Cambiar Contraseña</h1></center></label>
                       
                    </div> 
                 
                 <div class="form-group has-feedback">  
                        <input type="password" id="contraseniaActual" class="form-control mi-input" placeholder="Contraseña Actual..." required style="background-color:transparent; ">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                       
                    </div> 
                 <div id="nuevaClave" hidden="hidden">
                 
      <div class="form-group has-feedback">  
                        <input type="password" id="contraseniaC" class="form-control mi-input" placeholder="Nueva contraseña..." required style="background-color:transparent; ">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <div id="validaCambio1"> 
                             <!--<b><input id="texto" style=" height: 16px; font-size: 14px; background: transparent; border:none" value=""></b>-->
                            <span class="col-xs-4"  style="background: red; color:#ffffff; height: 12px; font-size: 10px">Insegura</span>
                            <span class="col-xs-4" style="background: orange; color:#ffffff ; height: 12px; font-size: 10px ">Segura</span>
                            <span class="col-xs-4" style="background: #2f8249; color:  #ffffff ;height: 12px; font-size: 10px">Muy segura</span>
                       </div>
                    </div> 
                    
                    <div class="form-group has-feedback">
                        <input type="password" id="repcontraseniaC" class="form-control mi-input" placeholder="Confirmar contraseña..." required  style="background-color:transparent;  ">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <div id="validaCambio2">  
                         <!--   <b><input id="texto1" style=" height: 16px; font-size: 14px; background: transparent; border:none" value=""></b> -->
                        <span class="col-xs-4"  style="background: red; color:#ffffff; height: 12px; font-size: 10px">Insegura</span>
                        <span class="col-xs-4" style="background: orange; color:#ffffff ; height: 12px; font-size: 10px ">Segura</span>
                        <span class="col-xs-4" style="background: #2f8249; color:  #ffffff ;height: 12px; font-size: 10px">Muy segura</span>
                       
                       </div>
                    </div>
                    </div>
                    
                    
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" id="btnRestaurarCambio" class="btn btn-primary btn-block btn-flat">Cambiar Contraseña</button>
                            <div class="social-auth-links">
                            
                </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div id="msg_infoCambio">
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
        </div >
        
    </section>
</div>    
<?php include_once('barras/footer.php'); ?>
<?php include_once('modal/msg.php'); ?>
<?php include_once('scriptPage.php'); ?>
<script src="assets/js/cambiaContrasenia.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip
<script src="assets/js/ordenesWS.js"></script> -->


