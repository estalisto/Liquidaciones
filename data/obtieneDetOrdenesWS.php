<?php 
require_once('../class/Liquidacion.php');
require_once('../configuracion/configuracion.php');
require_once('../funcionesWS/funcionesConsulta.php');
require_once('../class/OrdenesWS.php');
require_once('../class/CredencialesWS.php');
require_once('../class/MetodosWS.php'); 
require_once('../class/InstanciaWS.php'); 

if(isset($_POST['idOrden'])){
    $idOrden = $_POST['idOrden'];
   //$idOrden=146291;
    // print_r($idOrden);
    $DOCUMENT_ORIGIN = CURSOROR;

    
    $session = new Database();//session is at default constructor.
    $parametros = $session->getSession('Amb');
    $pos = strpos($parametros,'/');
       
    $idEmpresa = substr($parametros,$pos+1,1);  // bcd   1/1/1
    
    $parametros = substr($parametros,$pos+1);  // bcd   1/1/1
    $pos = strpos($parametros,'/');
    
    $idInstancia = substr($parametros,$pos+1,1);  // bcd   1/1
    
    $regCredencialesWS = $credencialesWS->obtieneIdCredencialWS($idEmpresa,$idInstancia);
    
    $idCredencialWS=$regCredencialesWS['id_credencial'];
    $idUsuarioWS=$regCredencialesWS['usuario'];
    $idContraseniaWS=$regCredencialesWS['contrasenia']; 
    $instanciaWS=$regCredencialesWS['instancia']; 
    $serviceName = $metodosWS->obtieneMetodoOrden($idCredencialWS,'DETALLEORDEN');
    $ip = $vinstanciaWS->obtieneIpInstanciaWS($idInstancia,$idEmpresa);
    
    //$SERVICE_NAME1 = DETALLEORDEN;    
    $params1 = array('INUORDERID' => $idOrden);  
    //$resultado1 = execute_ws($SERVICE_NAME1, $params1, $DOCUMENT_ORIGIN);
    $resultado1 = execute_ws($serviceName['metodo'], $params1, $DOCUMENT_ORIGIN,$idUsuarioWS,$idContraseniaWS,$instanciaWS,$ip['ip']);
        
    
    
    
    
    /*
    $SERVICE_NAME2 = IMAGENES;    
    $params2 = array('INUCODIGO' => $idOrden,
                     'ISOBJECTO' => 'OR_ORDER');  
    $resultado2 = execute_ws($SERVICE_NAME2, $params2, $DOCUMENT_ORIGIN);*/
    
     
   if ($resultado1){
       
       
    ?>
<form name='aqui' action="data/imprimeDetOrdenesWS.php" method="POST">
    <div class="col-md-6">
        <button id="obtenerActas" type="button" class="btn btn-primary btn-sm  btn-responsive btninter right" onclick="ocultaDiv(1)"> 
         Atrás 
        <span class="glyphicon glyphicon-backward" aria-hidden="true" ></span>
        </button>
    </div>
    <br>
    <div>
     <section class="content-header" align="center">
        <h1>
            Detalle de Orden de Trabajo N° <?php echo $idOrden ?>
        </h1>
    </section>
    </div>
    <div class="content table-responsive">      
        <table id="myTable-ordenesWS" class="table table-striped table-bordered table-hover display nowrap dataTable no-footer">
            <thead style="background-color: #04496d; color: #b1dbf5;">
                <tr class="primary">
                    <th><center>ORDEN ORIGEN</center></th>
                    <th><center>ORDEN</center></th>
                    <th><center>ID ITEM</center></th>
                    <th><center>CODIGO ITEM</center></th>
                    <th><center>DESCRIPCION RUBRO</center></th>
                    <th><center>UNIDAD</center></th>
                    <th><center>FECHA</center></th>
                    <th><center>CANTIDAD</center></th>                   
                    <th><center>VALOR</center></th>
                    <th><center>VALOR TOTAL</center></th>
                  
                </tr>
            </thead>
            <tbody>
            	<?php
                    foreach($resultado1 as $valor):  
                ?>
                <tr style="background-color: #F5F5DC; color: #000;">
                    <td id="idOrden"><center><h6><?= $valor['ORDEN_ORIGEN']; ?></center></h6></td>
                    <td><center><h6><?= $valor['ORDER_ID']; ?></center></h6></td>
                    <td><h6><?= $valor['ID_ITEM'];  ?></h6></td>
                    <td><h6><?= $valor['CODIGO_ITEM'];  ?></h6></td>
                    <td><h6><?= $valor['DESCRIPCION_RUBRO'];  ?></h6></td>
                    <td><center><h6><?= $valor['UNIDAD'];  ?></h6></center></td>
                    <td><h6><?= $valor['ASSIGNED_DATE'];  ?></h6></td>
                    <td><center><h6><?= $valor['CANTIDAD']; ?></h6></center></td>
                    <td><center><h6><?= $valor['VALOR']; ?></h6></center></td>
                    <td><center><h6><?= $valor['VALOR_TOTAL']; ?></h6></center></td>

                    
                </tr>
	        <?php endforeach; ?>
                
            </tbody>     
            
                
             
        </table>
    </div>
</form>
<!-- for the datatable of employee -->
<script type="text/javascript">
    
      
    $(document).ready(function() {
        $('#myTable-ordenesWS').DataTable();
    });   
 
    
</script>
<?php 
    }else {
?>
<script>
   alert('No data');    
</script>
<?php }   
}?>


