<?php include("barras/cabecera.php"); ?>    
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script type="text/javascript" src="assets/js/loader.js">-->

<div class="content-wrapper">
    <section class="content-header">
        <h1>
           Estadisticos de Actas
        </h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
	<!--
        <div class="content ">
            <form action="" id="grafico">
                <div class="row"> 
                    <div class="col-lg-7 col-lg-offset-3" >
                    <div class="box box-danger">  
                        <div class="box-header with-border">
                            Buscar Actas
                        </div>
                        <div class="box-body"> 
                            
                        <div class="form-group col-lg-9 col-lg-offset-3">
                            
                            <div class="selector-contratos">
                                Contrato: <select id="idContrato"></select>
                            </div>
                        </div>
                            <br />
                        <div class="form-group col-lg-10 col-lg-offset-5">
                            <button class="btn btn-primary btn-sm" type="button" onclick="estadistico(550,400)">Consultar</button>
                        </div>
                            
                       </div>    
                    </div>
                    </div>  
                </div>    
            </form>     
        
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                        Cuadros Estadisticos - General de Actas
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="row">
                        <div class="col-lg-9 col-lg-offset-2 col-md-12 col-xs-12" >
                            <div class="chart" id="generalActas" ></div>
                        </div>
                        </div>
                    </div>    
                </div> 
                <div class="box box-primary"> 
                    <div class="box-header with-border">
                        Cuadros Estadisticos - Detalle de Actas
                    </div>
                    <div class="box-body">
                        <div class="row">
                        <div class="col-lg-9 col-lg-offset-1">
                        <div class="chart" id="detalleActas" ></div>
                        </div>
                        </div>
                    </div>    
                </div>    
        </div>
       -->

    </section>
</div>    
<?php include_once('barras/footer.php'); ?>
<?php include('script.php'); ?>     

