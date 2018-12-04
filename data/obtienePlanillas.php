<?php 
require_once('../class/Liquidacion.php');
/* @var $liquidacion type */
$liqui = $liquidacion->obtieneParametros();
 ?>
<div class="content table-responsive">      
        <table id="myTable-planilla" class="table table-striped table-bordered table-hover display nowrap dataTable no-footer">
            <thead style="background-color: #04496d; color: #b1dbf5;">
                <tr class="primary">
                    <!--<th><center>Secuencia</center></th>-->
                    <th><center>Planilla</center></th>
                    <th><center>Fecha Inicio</center></th>
                    <th><center>Fecha Fin</center></th>
                    <th><center>CONTRATISTA</center></th>
                    <th><center>Fiscalizador EPAM</center></th>
                    <th><center>Supervisor VEOLIA</center></th>
                    <th><center>Contrato</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
            	<?php
                    foreach($liqui as $a): 
                    
                ?>
                <tr style="background-color: #F5F5DC; color: #000;">
                    <!--<td><center><h6><?= $a['SECUENCIA']; ?></center></h6></td>-->
                    <td><center><h6><?= $a['PLANILLA']; ?></center></h6></td>
                    <td><h6><?= $a['FECHA_INICIO']; ?></h6></td>
                    <td><h6><?= $a['FECHA_FIN']; ?></h6></td>
                    <td><h6><?= $a['CONTRATISTA']; ?></h6></td>
                    <td><h6><?= $a['FISCALIZADOR_EPAM']; ?></h6></td>
                    <td><h6><?= $a['SUPERVSOR_VEOLIA']; ?></h6></td>
                    <td><center><h6><?= $a['CONTRATO']; ?></h6></center></td>
                    <td><center><h6><?= $a['ESTADO_L']; ?></h6></center></td>
                    <td style="text-align: center " width="15%">
                        <button data-toggle="tooltip" title="Editar" id="editarPlanilla" type="button" onclick="accionPlanilla('<?= $a['SECUENCIA']; ?>','A')" class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button>  
                        <button data-toggle="tooltip" title="Visualizar" onclick="accionPlanilla('<?= $a['SECUENCIA']; ?>','V')" type="button" class="btn btn-info btn-sm">
                            <span  class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </button>
                      <input id="verificaPlanilla" type="hidden" value="reg">
                    </td>
                </tr>
	            <?php endforeach; ?>
                
                                
            </tbody>
        </table>
</div>
<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-planilla').DataTable();
    });
</script>

<?php $liquidacion->Disconnect(); ?>