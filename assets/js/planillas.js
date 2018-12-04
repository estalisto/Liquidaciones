$(document).ready(function () {
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
    });//end a req*/



});

function accionPlanilla(idSecuencia, idAccion) {
    //nPlanilla nFechaInicio nFechaFin nFiscalizadorEpan nSupervisorVeolia nContrato nEstado  
    $('#nPlanilla').prop("disabled", false);
    $('#nFechaInicio').prop("disabled", false);
    $('#nFechaFin').prop("disabled", false);
    $('#nFiscalizadorEpam').prop("disabled", false);
    $('#nSupervisorVeolia').prop("disabled", false);
    $('#nContrato').prop("disabled", false);
    $('#nContratista').prop("disabled", false);
    
    if (idAccion === 'V') {
        var idnSecuencia = idSecuencia;
        $.ajax({
            url: 'data/obtienePlanilla.php',
            type: 'post',
            dataType: 'json',
            data: {
                idnSecuencia: idnSecuencia
            },
            success: function (data) {
                $('#accion-modal').val('ver');
                $('#nIdSecuencia').val(idnSecuencia);
                //$('#nDescrip').val(data.DESCRIPCION);
                $('#nPlanilla').val(data.PLANILLA);
                $('#nFechaInicio').val(data.FECHA_INICIO);
                $('#nFechaFin').val(data.FECHA_FIN);
                $('#nFiscalizadorEpam').val(data.FISCALIZADOR_EPAM);
                $('#nSupervisorVeolia').val(data.SUPERVSOR_VEOLIA);
                $('#nContrato').val(data.CONTRATO);
                $('#nContratista').val(data.CONTRATISTA);
                $('#nEstado').val(data.ESTADO_L);
                $('#nFechaCrea').val(data.FECHA_CREA);
                $('#nUsuarioCrea').val(data.USUARIO_CREA);
                $('#nFechaActualiza').val(data.FECHA_ACTUALIZA);
                $('#nUsuarioActualiza').val(data.USUARIO_ACTUALIZA);
                $('#modal-planilla').find('.modal-title').text('Planilla');
                $('#modal-planilla').modal('show');
                $('#nPlanilla').attr('disabled', 'disabled');
                $('#nFechaInicio').attr('disabled', 'disabled');
                $('#nFechaFin').attr('disabled', 'disabled');
                $("#nFiscalizadorEpam").attr('disabled', 'disabled');
                $("#nSupervisorVeolia").attr('disabled', 'disabled');
                $('#nContrato').attr('disabled', 'disabled');
                $('#nContratista').attr('disabled', 'disabled');
                $('#nEstado').attr('disabled', 'disabled');
                $("#guardarPlanilla").hide();
                $('#auditoriaC').removeAttr('hidden');
                //alert($('#nFechaActualiza').val());
             //   if ($('#nFechaActualiza').val()!=="" ||$('#nFechaActualiza').val()!==null){
              //      alert('entro '.data.FECHA_ACTUALIZA);
                $('#auditoriaA').removeAttr('hidden');
               // }
            },
            error: function () {
                eMsg(72);
            }
        });
    } else {

        if (idAccion === 'A') {
            var idnSecuencia = idSecuencia;
            $.ajax({
                url: 'data/obtienePlanilla.php',
                type: 'post',
                dataType: 'json',
                data: {
                    idnSecuencia: idnSecuencia
                },
                success: function (data) {
                    $('#accion-modal').val('ver');
                    $('#nIdSecuencia').val(idnSecuencia);
                    $('#nPlanilla').val(data.PLANILLA);
                    $('#nFechaInicio').val(data.FECHA_INICIO);
                    $('#nFechaFin').val(data.FECHA_FIN);
                    $('#nFiscalizadorEpam').val(data.FISCALIZADOR_EPAM);
                    $('#nSupervisorVeolia').val(data.SUPERVSOR_VEOLIA);
                    $('#nContrato').val(data.CONTRATO);
                    $('#nContratista').val(data.CONTRATISTA);
                    
                    $('#hPlanilla').val(data.PLANILLA);
                    $('#hFechaInicio').val(data.FECHA_INICIO);
                    $('#hFechaFin').val(data.FECHA_FIN);
                    $('#hFiscalizadorEpam').val(data.FISCALIZADOR_EPAM);
                    $('#hSupervisorVeolia').val(data.SUPERVSOR_VEOLIA);
                    $('#hContrato').val(data.CONTRATO);
                    $('#hContratista').val(data.CONTRATISTA);
                    $('#nEstado').val(data.ESTADO_L);
                    $('#modal-planilla').find('.modal-title').text('Planilla');
                    $('#modal-planilla').modal('show');
                    $('#nEstado').attr('disabled', 'disabled');
                    $("#guardarPlanilla").show();
                    $('#auditoriaA').attr('hidden','hidden');
                    $('#auditoriaC').attr('hidden','hidden');
                },
                error: function () {
                    eMsg(72);
                }
            });
        }
    }
}


$(document).on('submit', '#formPlanilla', function (event) {
    event.preventDefault();
    var mensaje = '';
    var cantidad=0;
    if ($('#nFechaInicio').val() !== '' && $('#nFechaFin').val() !== '') {
        if ($('#nFechaInicio').val() > $('#nFechaFin').val()) {
            mensaje = 'La fecha fin no debe ser menor a la de inicio.';
            alert(mensaje);
        }
    }
    
    if ($('#nFechaInicio').val() === $('#hFechaInicio').val() &&
        $('#nFechaFin').val() === $('#hFechaFin').val() &&
        $('#nPlanilla').val() === $('#hPlanilla').val() &&
        $('#nFiscalizadorEpam').val() === $('#hFiscalizadorEpam').val() &&
        $('#nSupervisorVeolia').val() === $('#hSupervisorVeolia').val() &&
        $('#nContrato').val() ===$('#hContrato').val()&&
        $('#nContratista').val()===$('#hContratista').val())
    {
        mensaje= 'No se han realizado cambios en la pantalla.';
        bootbox.alert(mensaje);
        return ;
    }
    
    if($('#nFechaInicio').val() !== $('#hFechaInicio').val() ||
       $('#nFechaFin').val() !== $('#hFechaFin').val() ||
       $('#nPlanilla').val() !== $('#hPlanilla').val()|| 
       $('#nContrato').val() !==$('#hContrato').val()){
       
        cantidad=verificaPlanillaRepetida($('#nPlanilla').val(),
                                          $('#nFechaInicio').val(),
                                          $('#nFechaFin').val(),
                                          $('#nContrato').val());
        if (cantidad > 0 ){
            /*$('#modal-msg').find('#msg-body').text("La planilla a ingresar se encuentra configurada, cambie los párametros de configuración.");
            $('#modal-msg').modal('show');*/
            bootbox.alert("La planilla a ingresar se encuentra configurada, cambie los párametros de configuración.");
            return ;
          }
   }

    if (mensaje === '') {
        var secuencia        = $('#nIdSecuencia').val();
        var planilla         = $('#nPlanilla').val();
        var fechaInicio      = $('#nFechaInicio').val();
        var fechaFin         = $('#nFechaFin').val();
        var fiscalizadoEpam  = $('#nFiscalizadorEpam').val();
        var supervisorVeolia = $('#nSupervisorVeolia').val();
        var contrato         = $('#nContrato').val();
        var contratista      = $('#nContratista').val();
        $.ajax({
            url: 'data/editarPlanilla.php',
            type: 'post',
            dataType: 'json',
            data: {
                secuencia: secuencia,
                planilla: planilla,
                fechaInicio: fechaInicio,
                fechaFin: fechaFin,
                fiscalizadoEpam: fiscalizadoEpam,
                supervisorVeolia: supervisorVeolia,
                contrato: contrato,
                contratista:contratista
            },
            success: function (data) {
                if (data.valid === valid) {
                    //refMulta($('#txtActaMulta').val());
                    regPlanilla();
                    $('#modal-nuevaMulta').modal('hide');
                    $('#modal-msg').find('.modal-title').text('Actualizar Multa');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                    $('#modal-planilla').modal('hide');

                }


            },
            error: function () {
                eMsg(58);
            }
        });
    }
});

function regPlanilla() {
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

        }
        
function verificaPlanillaRepetida(planilla, fechaInicio, fechaFin, contrato){
          var cantidad=0;
          
          $.ajax({
                url: 'data/verificaPlanillaRepetida.php',
                type: 'post',
                dataType: 'json',
                async : false, 
                data: {
                    planilla: planilla,
                    fechaInicio: fechaInicio,
                    fechaFin : fechaFin,
                    contrato : contrato
                },
                success: function (data) {
                    cantidad = data.cantidad;
                  },
                error: function () {
                alert('Error: verificaPlanillaRepetida');
                }
        }); //end a req*/
          
         return cantidad;   
        }        
        
function creaPlantillaRiot() {
    //var idActa =$('#txtActaMulta').val();
    riot.mount('planilla-modal');
}



  