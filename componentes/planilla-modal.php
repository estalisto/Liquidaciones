<planilla-modal>
    
    <div id="planilla-modal-nuevo" class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Comfiguración de Planilla</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="content table-responsive">
                        <table id="tabla-planilla" class="table  table-bordered table-hover table-striped" >
                            <thead class="ingreso" style="background-color: #04496d; color: #b1dbf5; ">
                                <tr>
                                    <th>PLANILLA</th>
                                    <th>FECHA INICIO</th>
                                    <th>FECHA FIN</th>
                                    <th>CONTRATISTA</th>
                                    <th>FISCALIZADOR EPAM</th>
                                    <th>SUPERVISOR VEOLIA</th>
                                    <th>CONTRATO</th>
                                    <th>ACCIÓN</th>

                                </tr>
                                <tr style="background-color: #04496d; color: #000; " >
                                    <td><input class="ingreso valores" type="number" min="1" id="txtPlanilla" required ></td>
                                    <td><div class="input-group  ">
                                            <input id="txtFechaInicio" type="date" class="form-control ingreso valores" >
                                          
                                        </div> 
                                        
                                    <td>
                                        <div class="input-group  ">
                                            <input id="txtFechaFin" type="date" class="form-control ingreso valores">
                                           
                                        </div>

                                        </td> 
                                    <td><input class="ingreso valores" type="text" id="txtContratista" required style="text-transform:uppercase;"></td>    
                                    <td><input class="ingreso valores" type="text" id="txtFiscEpam" required style="text-transform:uppercase;"></td>
                                    <td><input class="ingreso valores" type="text" id="txtSuperVeolia" required style="text-transform:uppercase;"></td>
                                    <td><input class="ingreso valores" type="number" min="1"   id="txtContrato" required></td>
                                    <td><button id="btCrearRiot" onclick={agregar}  type="button" class="btn btn-success btn-sm  btn-responsive btninter right "> 
                                            Agregar
                                        </button>
                                    </td>

                                </tr>
                            </thead>
                            <tbody> 
                                <tr each={data}>
                                    <td>{txtPlanillaD}</td> 
                                    <td>{txtFechaInicioD}</td> 
                                    <td>{txtFechaFinD}</td> 
                                    <td>{txtContratistaD}</td>
                                    <td>{txtFiscEpamD}</td> 
                                    <td>{txtSuperVeoliaD}</td> 
                                    <td>{txtContratoD}</td> 
                                    <td><button  id="btCrearRiot" onclick={retirar}  type="button" class="btn btn-danger btn-sm  btn-responsive btninter right "> 
                                            Quitar
                                        </button>
                                    </td>

                                </tr>
                            </tbody>
                        </table> 

                    </div>   
                </div>
                <div class="modal-footer">
                    <button if={data.length >0} onclick={guardar} type="button" class="btn btn-primary"><span style="color:#000;" class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span style="color:#FF0000;" class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Salir</button> 
                </div>
            </div>
        </div>
    </div>
  
    <!-- estilos -->
    <style>
        .ingreso{
            height: 25px;
            font-size: 11px

        }
        .valores{
            width: 90px
        }

        .spam{
            width: 10px;
            height: 8px;
        }
    </style>


    <script>
        var self = this;
        self.ready = false;
        self.data = []; // creo arreglo para guardar la data seleccionada

        agregar(){
            var mensaje = '';
            var cantidad = 0;
            mensaje = validar();
            
            if (mensaje === '' || mensaje === null){
                cantidad=verificaPlanillaRepetida($('#txtPlanilla').val(),
                                                  $('#txtFechaInicio').val(),
                                                  $('#txtFechaFin').val(),
                                                  $('#txtContrato').val());
                
                if (cantidad > 0 ){
                  $('#modal-msg').find('#msg-body').text("La planilla a ingresar se encuentra configurada, cambie los párametros de configuración.");
                  $('#modal-msg').modal('show');
                  return ;
                }
                
                mensaje=veriricaRepetidoTabla();
                if (mensaje !== '' ){
                  $('#modal-msg').find('#msg-body').text(mensaje);
                  $('#modal-msg').modal('show'); 
                  return;
                }
                

                var txtPlanillaD = document.getElementById('txtPlanilla'),
                        txtFechaInicioD = document.getElementById('txtFechaInicio'),
                        txtFechaFinD = document.getElementById('txtFechaFin'),
                        txtContratistaD = document.getElementById('txtContratista'),
                        txtFiscEpamD = document.getElementById('txtFiscEpam'),
                        txtSuperVeoliaD = document.getElementById('txtSuperVeolia'),
                        txtContratoD = document.getElementById('txtContrato');
                var planilla = {
                txtPlanillaD:txtPlanillaD.value,
                        txtFechaInicioD:txtFechaInicioD.value,
                        txtFechaFinD:txtFechaFinD.value,
                        txtContratistaD:txtContratistaD.value,
                        txtFiscEpamD: txtFiscEpamD.value,
                        txtSuperVeoliaD: txtSuperVeoliaD.value,
                        txtContratoD: txtContratoD.value
                };
                self.data.push(planilla);
                txtPlanillaD.value = '';
                txtFechaInicioD.value = '';
                txtFechaFinD.value = '';
                txtContratistaD.value = '';
                txtFiscEpamD.value = '';
                txtSuperVeoliaD.value = '';
                txtContratoD.value = '';
            }
        }

        retirar(e){
        var item = e.item; // obtenemos el item de la tabla
        var index = self.data.indexOf(item);
        self.data.splice(index, 1); // borra el indice especificado
        }

        this.on('mount', function(){
        $('#planilla-modal-nuevo').modal();
        })

           function validar(){
                var mensaje = '';
                var fechaInicio = $('#txtFechaInicio').val();
                var fechaFin = $('#txtFechaFin').val();
                if (fechaInicio !== '' && fechaFin !== '') {
                if (fechaInicio > fechaFin) {
                mensaje = 'La fecha fin no debe ser menor a la de inicio.';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }
                }

                if (document.getElementById('txtPlanilla').value == '' || document.getElementById('txtPlanilla').value == null) {
                mensaje = 'Debe ingresar el número de planilla.';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }

                if (document.getElementById('txtFechaInicio').value == '' || document.getElementById('txtFechaInicio').value == null) {
                mensaje = 'Debe ingresar la fecha inicio.';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }

                if (document.getElementById('txtFechaFin').value == '' || document.getElementById('txtFechaFin').value == null) {
                mensaje = 'Debe ingresar la fecha fin';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }
                
                if (document.getElementById('txtFiscEpam').value == '' || document.getElementById('txtFiscEpam').value == null) {
                mensaje = 'Debe ingresar el nombre del fiscalizador de la EPAM';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }

                if (document.getElementById('txtContratista').value == '' || document.getElementById('txtContratista').value == null) {
                mensaje = 'Debe ingresar el nombre del Contratista';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }

                if (document.getElementById('txtSuperVeolia').value == '' || document.getElementById('txtSuperVeolia').value == null) {
                mensaje = 'Debe ingresar el nombre del supervisor VEOLIA';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }

                if (document.getElementById('txtContrato').value == '' || document.getElementById('txtContrato').value == null) {
                mensaje = 'Debe ingresar el número de contrato';
                $('#modal-msg').find('#msg-body').text(mensaje);
                $('#modal-msg').modal('show');
                return mensaje;
                }
                return mensaje;
                }


        guardar(){
            
          $.ajax({
            url: 'data/insertaPlanillaMasiva.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                    data: self.data
                    },
                    success: function (data) {
                    if (data.valid === valid){
                    regPlanilla();
                    $('#planilla-modal-nuevo').modal('hide');
                    $('#modal-msg').find('.modal-title').text('Ingresar Multa');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                    }
                    },
                    error: function(){
                    eMsg(26);
                    }
            });
        }
        
     function  veriricaRepetidoTabla(){ 
        /* Por cada columna */
        
        var tableReg = document.getElementById('tabla-planilla');
        var planilla = document.getElementById('txtPlanilla').value.toLowerCase();
        var fechaInicio = document.getElementById('txtFechaInicio').value.toLowerCase();
        var fechaFin   = document.getElementById('txtFechaFin').value.toLowerCase();
        var contrato   = document.getElementById('txtContrato').value.toLowerCase();
        var cellsOfRow="";
        var found=false;
        var compareWith="";
        var mensaje = '';
        var cadena ='';
        var planilla_t='';
        var fechaInicio_t='';
        var fechaFin_t='';
        var contrato_t='';
        
        var parametro=planilla+fechaInicio+fechaFin+contrato;
         //alert(planilla+" "+fechaInicio+" "+fechaFin+" "+contrato);
        // Recorremos todas las filas con contenido de la tabla

        for (var i = 1; i < tableReg.rows.length; i++)
        {
            cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            found = false;
            cadena = '';
             // Recorremos todas las celdas
            for (var j = 0; j < cellsOfRow.length  ; j++)
              {
                compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                // Buscamos el texto en el contenido de la celda
                if ((compareWith.indexOf('id=') > -1)){
                   }
                     else{
                         //alert(compareWith);
                        //if ((compareWith.indexOf(planilla) > -1))
                        if (j==0 || j==1 || j==2||j ==6)
                        {
                          //found = true;
                          
                          if (cadena ==''){
                            cadena = compareWith; 
                          }else{
                             cadena =cadena+'/'+compareWith;  
                          }
                          
                        }
                    }

                }
               // alert(cadena);
               
                if(cadena.indexOf(parametro)>-1)
                {
                    mensaje="La configuración ya se encuentra en la lista para ser registrada";
                    return mensaje;
                }
                
                if (cadena.indexOf('/')>-1){
                   planilla_t= cadena.substr(0, cadena.indexOf('/'));
                //   alert('planilla_t: '+planilla_t);
                   cadena = cadena.substr(cadena.indexOf('/')+1);
                //   alert('cadena: '+cadena);
                   fechaInicio_t = cadena.substr(0, cadena.indexOf('/'));
                //   alert('fechaInicio_t: '+fechaInicio_t);
                   cadena = cadena.substr(cadena.indexOf('/')+1);
                //   alert('cadena: '+cadena);
                   fechaFin_t = cadena.substr(0, cadena.indexOf('/'));
                //   alert('fechaFin_t: '+fechaFin_t);
                   cadena = cadena.substr(cadena.indexOf('/')+1);
                //   alert('cadena: '+cadena);
                   contrato_t = cadena;
                //   alert('contrato_t: '+contrato_t);
                //   alert('ante');
                   if (planilla_t == planilla && contrato == contrato_t ){
                //       alert('entro a validar fecha ');
                       if (fechaInicio >= fechaInicio_t && fechaInicio<= fechaFin_t ){
                           mensaje="No se pueden registrar planillas dentro del mismo rango de fechas";
                           return mensaje;
                       }
                   }
                   
                }

        }
        return mensaje;
    
    }  
    
    /*function regPlanilla() {
        $.ajax({
        url: 'data/obtienePlanillas.php',
                type: 'post',
                data: {

                },
                success: function (data) {
                $('#table-planillas').html(data);
                var ver = $('#verificaPlanilla').val();
                if (ver === 'reg') {
                $('#table-planillas').show();
                } else {
                alert('No encontro Datos');
                $('#table-planillas').hide();
                }
                },
                error: function () {
                alert('Error: obtiene parametros planillas.js L13+');
                }
        }); //end a req*/

      //  }

    </script> 


</planilla-modal>