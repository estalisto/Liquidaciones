<?php 
require_once("barras/cabecera.php"); ?>    

<style>
table.table-bordered{
    border:1px solid blue;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid blue;
}
table.table-bordered > tbody > tr > td{
    border:1px solid blue;
}

</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Liquidación de Ordenes de Trabajo
        </h1>

       <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="LiquidacionOTExcel.php"><i class="active"></i> Reporte Excel</a></li>
        </ol>
    </section>

    <section class="content">
        <table  class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="3" ROWSPAN="2" class="text-center col" style="background: #FFFFFF;"><img src="dist/img/epam_veo.png" alt="" width="400" height="60" /></td>                 
                    <td colspan="5" class="text-center text-bold col" style="background: #B7B7B1;">MANTENIMIENTO DE REDES DE AGUA POTABLE Y ALCANTARILLADO</td>
                </tr>   
                <tr>              
                    <td colspan="5" class="text-center text-bold col" style="background: #B7B7B1;">LIQUIDACIÓN DE ORDEN DE TRABAJO</td>
                </tr>  
                <tr>
                  <td colspan="2" class="text-right text-bold text-sm col" style="background: #B7B7B1;">No</td><td  class="text-center text-bold "  style="background: #FFFFFF;"><strong>99945</strong></td> 
                  <td class="text-right text-bold text-sm col" style="background: #B7B7B1;">CONTRATISTA:</td><td class="text-center text-bold col"  style="background: #FFFFFF;">22</td> 
                  <td class="text-right text-bold text-sm col" style="background: #B7B7B1;">SUPERVISOR/VEOLIA:</td><td class="text-center text-bold col"  style="background: #FFFFFF;">SGRANDA</td> 
                </tr>
                <tr>
                  <td colspan="2" class="text-right text-bold text-sm col" style="background: #B7B7B1;">DIRECCIÓN:</td><td   class="text-center text-bold "  style="background: #FFFFFF;">90365</td> 
                  <td class="text-right text-bold text-sm col" style="background: #B7B7B1;">FISCALIZADOR EPAM:</td><td class="text-center text-bold col"  style="background: #FFFFFF;">22</td> 
                  <td class="text-right text-bold text-sm col" style="background: #B7B7B1;">PLANILLA:</td><td class="text-center text-bold col"  style="background: #FFFFFF;">SGRANDA</td> 
                </tr>  
                <tr>
                  <td colspan="2"  class="text-right text-bold text-sm col" style="background: #B7B7B1;">TRABAJO/TRAMITE SOLIC.:</td><td  class="text-center text-bold "  style="background: #FFFFFF;">90365</td> 
                  <td  class="text-right text-bold text-sm col" style="background: #B7B7B1;">TRAB.EJECUTADO/SOLUCIÓN TEC.</td><td colspan="3"class="text-center text-bold col"  style="background: #FFFFFF;">FUGA DE RED DE DISTRIBUCIÓN</td>                   
                </tr> 
                <tr>
                  <td colspan="2"  class="text-right text-bold text-sm col" style="background: #B7B7B1;">FECHA SOLIC.:</td><td   class="text-center text-bold "  style="background: #FFFFFF;">90365</td> 
                  <td class="text-right text-bold text-sm col" style="background: #B7B7B1;">FECHA SOLUCIÓN TÉCNICA:</td><td class="text-center text-bold col"  style="background: #FFFFFF;">22</td> 
                  <td class="text-right text-bold text-sm col" style="background: #B7B7B1;">FECHA FINALIZACIÓN:</td><td class="text-center text-bold col"  style="background: #FFFFFF;">SGRANDA</td> 
                </tr> 
                <tr>
                  <td colspan="12"  class="text-center text-sm"></td>                   
                </tr> 
                 <tr>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #B7B7B1;">CÓDIGO RUBRO</td>
                  <td  colspan="2" class="text-center text-bold text-sm col-lg-4" style="background: #B7B7B1;">DESCRIPCIÓN RUBRO</td>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #B7B7B1;">UNIDAD</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #B7B7B1;">CANTIDAD</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #B7B7B1;">PRECIO UNITARIO</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #B7B7B1;">COSTO TOTAL</td>
                </tr> 
                <tr>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;">1</td>
                  <td  colspan="2" class="text-center text-bold text-sm col-lg-4" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                </tr> 
                <tr>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;">2</td>
                  <td  colspan="2" class="text-center text-bold text-sm col-lg-4" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                </tr> 
                <tr>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;">3</td>
                  <td  colspan="2" class="text-center text-bold text-sm col-lg-4" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                </tr> 
                <tr>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;">4</td>
                  <td  colspan="2" class="text-center text-bold text-sm col-lg-4" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                </tr> 
                <tr>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;">4</td>
                  <td  colspan="2" class="text-center text-bold text-sm col-lg-4" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-1" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;"></td>
                </tr> 
                <tr>
                  <td colspan="3" ROWSPAN="3" class="text-left text-bold  text-sm col-lg-1" style="background: #FFFFFF;">OBSERVACION:<br></td>
                  <td ROWSPAN="3"class="text-center text-bold  text-sm col-lg-1" style="background: #FFFFFF;vertical-align: bottom;">SUPERVISOR VEOLIA<br>KEVIN SANTANA</td>
                  <td ROWSPAN="3"class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF; vertical-align: bottom;">FISCALIZADOR EPAM<br>MARCELO FLORES</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;">COSTO TOTAL:</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;">00.00</td>
                </tr>
                <tr>
             
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;">I.V.A.(12%):</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;">00.00</td>
                </tr>
                <tr>
          
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;">COSTO TOTAL OT:</td>
                  <td class="text-center text-bold text-sm col-lg-2" style="background: #FFFFFF;">00.00</td>
                </tr>
            </tbody>
          
        </table>
        

    </section>
</div>   
<?php include_once('barras/footer.php'); ?>
<?php include('script.php'); ?>     





