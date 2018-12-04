<br />
<?php
require_once('../class/OrdenesWS.php');
$ord = $ordenesWS->obtieneOrdenesWs();
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<form name='aqui' action="data/imprimeDetOrdenesWS.php" method="POST" target="_blank"> 
    <div class="row">  
        <div class="table-responsive">
            <table id="myTable-ordenes-ws" class="table table-bordered table-hover table-striped">
                <thead style="background-color: #04496d; color: #b1dbf5;">
                    <tr> <td colspan="2" align="left">
                            <span onMouseout="this.style.color='#b1dbf5'" onMouseover="this.style.color='#0261FC'"  style="color:#b1dbf5;" class="fa fa-file-pdf-o" aria-hidden="true"></span><button onMouseover="this.style.color='#0261FC'" onMouseout="this.style.color='#b1dbf5'"  style="color:#b1dbf5;"  class="btn btn-link btn-responsive btninter right active">GENERAR PDF </button> 
                        </td>  
                        <td colspan="9" align="left">
                          <!--  <span style="color:#1e8449;" class="fa fa-file-excel-o" ></span><button  style="color:#1e8449 ;" class="btn btn-link btn-responsive btninter right active">GENERAR EXCEL</button> 
                        --> </td> 
                    </tr>
                    <tr class="primary">
                        <th> <label for="seleccionar">Todas</label>
                            <input type="checkbox" id="seleccionar" name="seleccionar" onclick="seleccion()"></th>
                        <th><center>PLANILLA</center></th>
                <th><center>ORDEN</center></th>
                <!-- <th><center>ID TRABAJO SOLICITUD</center></th> -->
                <th><center>DIRECCIÓN</center></th>
                <th><center>TRABAJO SOLICITUD</center></th>
                <th><center>FECHA SOLICITUD</center></th>		   
                <th><center>SOLUCIÓN TÉCNICA</center></th>
                <th><center>FECHA SOLUCIÓN TÉCNICA</center></th>
                <th><center>FECHA FINALIZACIÓN</center></th>                   
                <th><center>Acciones</center> </th>

                </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($ord as $valor):
                        ?>
                        <tr style="background-color: #F5F5DC; color: #000;">
                            <td><center>
                        <input class="settings" type="checkbox"  id="setting-1" value="<?= $valor['ID_ORDEN']; ?>" name='select[]'>
                        <input id="verificaOrdenWS" type="hidden" value="reg">   

        <!-- <input class="settings" type="checkbox"  id="setting-1" value="<?php echo ($valor) ?>" name='select[]'>
                        -->
                    </center></td>
                    <td id="idOrden"><center><h6><?= $valor['PLANILLA']; ?></center></h6></td>
                    <td id="idOrden"><center><h6><?= $valor['ID_ORDEN']; ?></center></h6></td>
                    <!--<td><center><h6><?= $valor['ID_TRABAJO_SOLICITUD']; ?></center></h6></td>-->
                    <td><h6><?= $valor['DIRECCION']; ?></h6></td>
                    <td><h6><?= $valor['TRABAJO_SOLICITADO']; ?></h6></td>
                    <td><h6><?= $valor['FECHA_SOLICITUD']; ?></h6></td>
                    <td><h6><?= $valor['SOLUCION_TECNICA']; ?></h6></td>
                    <td><h6><?= $valor['FECHA_SOLUCION_TECNICA']; ?></h6></td>
                    <td><center><h6><?= $valor['FECHA_FINALIZACION']; ?></h6></center></td>
                    <td style="text-align: center " width="15%">
                        <button data-toggle="tooltip" title="Ver Detalle" onclick="obtieneDetalleOT('<?= $valor['ID_ORDEN']; ?>')" type="button" class="btn btn-info btn-sm">
                            <span  class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </button>
                    </td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tr >                 
                    <td colspan="11" align="left">
                        <input  type="IMAGE" value="IMPRIMIR" name="btn_ordenes" src="dist/img/ver-icon.png"  style="height:30px; width:30px" />
                    </td>    
                </tr>
            </table>
        </div>
    </div>
</form>  
<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable-ordenes-ws').DataTable({
            "paging": false,
            // "ordering": false,
            "info": false});
    });

    function seleccion() {
        for (i = 0; i < document.aqui.elements.length; i++)
            if (document.aqui.elements[i].type == "checkbox")
                if (document.aqui.seleccionar.checked == 1)
                    document.aqui.elements[i].checked = 1;
                else if (document.aqui.seleccionar.checked == 0)
                    document.aqui.elements[i].checked = 0;
    }


</script>

<?php $ordenesWS->Disconnect(); ?>