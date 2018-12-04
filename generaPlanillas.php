<?php include("barras/cabecera.php"); ?>    
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script type="text/javascript" src="assets/js/loader.js">-->

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Planillas Ordenes de Trabajo
        </h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">

        <div class="content "  id="table-planilla" >
            <form action="" id="grafico">
                <div class="row"> 
                    <div class="col-lg-7 col-lg-offset-3" >
                        <div class="box box-danger">  
                            <div class="box-header with-border">
                                Lista de Planillas
                            </div>
                            <div class="box-body"> 

                                <div class="form-group  col-lg-9 col-lg-offset-3">

                                    <div class="selector-planillas ">
                                         <select data-live-search="true" class="selectpicker" id="idPlanillas"></select>
                                    </div>
                                </div>
                                
                                <br />
                                <div class="form-group col-lg-10 col-lg-offset-4">
                                    <button class="btn btn-primary btn-sm" type="button" onclick="obtieneOrdenesTrabajo()">Generar Planilla</button>
                                </div>

                            </div>    
                        </div>
                    </div>  
                </div>    
            </form>     
        </div >

    </section>
</div>    
<?php include_once('barras/footer.php'); ?>
<?php include_once('modal/msg.php'); ?>
<?php include('script.php'); ?> 


