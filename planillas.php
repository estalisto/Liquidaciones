<?php include("barras/cabecera.php"); ?>
<?php require_once('session.php'); ?>



      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content-header">
            <h1>
               Configuración de Planillas
                </h1>
                        
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
        </section>
        
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Ocultar"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
               
              <!-- Start creating your amazing application! -->
              <div class="container-fluid">
                  
                  <div class="row">
                      <div class="col-md-6">
                         <button  id="btCrearPlanilla" onclick="creaPlantillaRiot()"  type="button" class="btn btn-primary btn-sm  btn-responsive btninter right"> 
                          <span class="glyphicon glyphicon-plus"  ></span>&nbsp;Crear</button>
                     </div>
                      <div class="pull-right" id="imprimePlanillas" hidden="true" >
                          <span style="color:#FF0000; " class="fa fa-file-pdf-o" aria-hidden="true"></span><button style="color:#FF0000; "  onclick="imprimeMultasPdf()" class="btn btn-link btn-responsive btninter right active">GENERAR PDF </button> 
                          <span style="color:#1e8449;" class="fa fa-file-excel-o" aria-hidden="true"></span><button style="color:#1e8449;"  onclick="imprimeMultasExcel()" class="btn btn-link btn-responsive btninter right active">GENERAR EXCEL</button>   
                      </div>    
                </div>
             </div> 
              <div id="table-planillas"></div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <!-- Footer -->
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
         
          <planilla-modal></planilla-modal> <!-- agrego el tag del modal -->
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
    <!-- modal here -->
    <?php include_once('modal/msg.php'); ?>
    <?php include_once('modal/planilla.php'); ?>
    <?php include_once('barras/footer.php'); ?>
    <?php include('script.php');?>
    <script src="assets/js/planillas.js"></script>
    
    
