
<div class="modal fade" id="modal-planilla" tabindex="-1"  >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h1  class="modal-title">Modal title</h1>
                    <input type="hidden" id="nIdSecuencia" value="" style="visibility:hidden"> 

            </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" id="formPlanilla">
                    <input type="hidden" id="accion-modal" value="">
                    <input type="hidden" id="hPlanilla" value="">
                    <input type="hidden" id="hFechaInicio" value="">
                    <input type="hidden" id="hFechaFin" value="">
                    <input type="hidden" id="hContratista" value="">
                    <input type="hidden" id="hFiscalizadorEpam" value="">
                    <input type="hidden" id="hSupervisorVeolia" value="">
                    <input type="hidden" id="hContrato" value="">
                <div class="content"> 
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Planilla:</label>
                      <div class="col-sm-9">
                          <input type="number" class="form-control" id="nPlanilla" >
                      </div>
                    </div>  
                    
                    <div class="form-group" id="divPorc">
                      <label class="control-label col-sm-3" for="">Fecha Inicio:</label>
                      <div class="col-sm-9">
                          <input type="date" class="form-control" id="nFechaInicio" required>
                      </div>
                    </div> 

                    <div class="form-group" id="divCant" >
                      <label class="control-label col-sm-3" for="">Fecha Fin:</label>
                      <div class="col-sm-9"> 
                          <input type="date" class="form-control" id="nFechaFin" required>
                      </div>
                    </div>
                    
                    <div class="form-group" id="divTotal">
                      <label class="control-label col-sm-3" for="">Contratista: </label>
                      <div class="col-sm-9"> 
                          <input type="text" class="form-control" style="text-transform:uppercase;" id="nContratista" required>
                      </div>
                    </div> 

                    <div class="form-group" id="divTotal">
                      <label class="control-label col-sm-3" for="">Fiscalizador EPAM:</label>
                      <div class="col-sm-9"> 
                          <input type="text" class="form-control" style="text-transform:uppercase;" id="nFiscalizadorEpam" required>
                      </div>
                    </div>      

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Supervisor VEOLIA:</label>
                      <div class="col-sm-9"> 
                          <input type="text"  class="form-control" id="nSupervisorVeolia" style="text-transform:uppercase;" required >
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Contrato:</label>
                      <div class="col-sm-9"> 
                          <input type="number"  class="form-control" id="nContrato"  required >
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Estado:</label>
                      <div class="col-sm-9"> 
                          <input type="text"  class="form-control" id="nEstado"   disabled="disable" >
                      </div>
                    </div> 
                    
                    <div class="form-group" id="auditoriaC" hidden="true">
                      <label class="control-label col-sm-3" for="">fecha Crea:</label>
                      <div class="col-sm-3"> 
                          <input type="text"  class="form-control" id="nFechaCrea"  disabled="disable" >
                      </div>
                      <label class="control-label col-sm-3" for="">Usuario Crea</label>
                      <div class="col-sm-3"> 
                          <input type="text"  class="form-control" id="nUsuarioCrea" disabled="disable"   >
                      </div>
                    </div> 
                    
                    <div class="form-group" id="auditoriaA" hidden="true">
                      <label class="control-label col-sm-3" for="">fecha Actualiza:</label>
                      <div class="col-sm-3"> 
                          <input type="text"  class="form-control" id="nFechaActualiza" disabled="disable"   >
                      </div>
                      <label class="control-label col-sm-3" for="">Usuario Actualiza</label>
                      <div class="col-sm-3"> 
                          <input type="text"  class="form-control" id="nUsuarioActualiza" disabled="disable"   >
                      </div>
                    </div> 
                                    
                    <div class="form-group"> 
                         <div class="col-sm-12" style="text-align:right"  btn-responsive btninter right active>
                             <button id="guardarPlanilla" type="submit" class="btn btn-primary btn-responsive btninter right btn-sm"> <span style="color:#000;" class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;Guardar</button>
                             <button type="button" class="btn btn-secondary" data-dismiss="modal"><span style="color:#FF0000;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Salir</button> 
                        </div>
                    </div> 
                    
                 </div>
            </form>          

        </div>
       

        </div>
    </div>
</div>

