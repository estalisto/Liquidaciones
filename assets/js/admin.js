
/* global riot */

function creaMultaRiot() {
    var idActa = $('#txtActaMulta').val();
    riot.mount('multa-modal', {
        idActa: idActa
    });
}

$.ajax({
    type: "POST",
    url: "data/obtieneListaPlanillas.php",
    success: function (response)
    {
        $('.selector-planillas select').html(response).fadeIn();
    }
});


function obtieneOrdenesTrabajo() {
    $.ajax({
        type: "POST",
        url: "data/obtienePlanillaPorId.php",
        dataType: 'json',
        data: {
            idSecuencia: $("#idPlanillas").val()
        },
        success: function (data)
        {   
           
           var anioAct = data.FECHA_INICIO.substring(0, 4); // 01 fechaInicio.getFullYear();
           var mesAct = data.FECHA_INICIO.substring(5,7);  //2018-05-16
           var diaAct = data.FECHA_INICIO.substring(8,10); // 20180510
                       
           var fecha_inicio = diaAct+'-'+mesAct+'-'+anioAct;
           
           anioAct = data.FECHA_FIN.substring(0, 4); // 01 fechaInicio.getFullYear();
           mesAct = data.FECHA_FIN.substring(5,7);  //201805
           diaAct = data.FECHA_FIN.substring(8,10); // 20180510
           
           var fecha_fin = diaAct+'-'+mesAct+'-'+anioAct;
           
           //alert('inspirado');
           jsShowWindowLoad("Procesando la información<br>Espere por favor");
           // $('#principal').attr('hidden', 'hidden');
            $.ajax({
                type: "POST",
                url: "data/obtieneOrdenesWS.php",                
                dataType: 'json',
                data: {
                    idSecuencia: $("#idPlanillas").val(),
                    planilla:   data.PLANILLA,
                    fechaInicio:fecha_inicio,
                    fechaFin :  fecha_fin,
                    contrato :  data.CONTRATO
                    
                },
                success: function (data)
                {  
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                    jsRemoveWindowLoad();
                   
                    //bootbox.alert(data);
                   // $('#table-planilla1').html(data);                    
                } 
            });
        }
    });
}        
/*
function obtieneOT(idOrden) {
    jsShowWindowLoad("Procesando la información<br>Espere por favor");
    $.ajax({
        data: {
            idOrden: idOrden//$("#idOrden").val()
        },
        type: "POST",
        url: "data/obtieneDetOrdenesWS.php",
        dataType: 'json',
        success: function (response)
        {   
            //bootbox.alert(response);
            jsRemoveWindowLoad();
            $('#myTable-planilla').html(response);                    
        }                   
    });
}*/
      

function actTotalMulta() {
    var cantida = $('#numCantidad').val();
    var valor = $('#numValor').val();

    if (valor === null) {
        valor = 0;
    }

    if (cantida === null) {
        cantida = 0;
    }

    var total = cantida * valor;
    total = total.toFixed(3);
    $('#numTotal').val(total);
}

function imprimeOrdsExcel() {
    //window.open('data/imprimeOrdenes.php?id='+id,'name','width=600,height=400');
    var idActa = $('#txtActa').val();
    var ver = $('#verificaOrdenes').val();
    if (ver === 'reg') {
        //alert("entro a generar el excel");
        /*$.ajax({
            url: 'data/excelOrdenes.php',
            type: 'post',
            data: {
                idActa: idActa
            },
            success: function (data) {
                $('#modal-msg').find('#msg-body').text('Archivo Generado Satisfactoriamente');
                $('#modal-msg').modal('show');
            },
            error: function () {
                eMsg(72);
            }
        });*/
	
	location.href = "data/excelOrdenes.php?idActa="+idActa;
    }

}
;

function imprimeDetOrdsExcel() {
    //window.open('data/imprimeOrdenes.php?id='+id,'name','width=600,height=400');
    var idActaOrden = $('#impIdActaOrdenes').val();
    var idOrd = $('#impIdOrden').val();
    var idActa = $('#impIdActa').val();


    var ver = $('#verificaOrdenes').val();
    if (ver === 'reg') {
        //alert("entro a generar el excel");
        /*$.ajax({
            url: 'data/excelDetOrdenes.php',
            type: 'post',
            data: {
                idActa: idActa,
                idOrd: idOrd,
                idActaOrden: idActaOrden

            },
            success: function (data) {
                $('#modal-msg').find('#msg-body').text('Archivo Generado Satisfactoriamente');
                $('#modal-msg').modal('show');
            },
            error: function () {
                eMsg(72);
            }
        });*/

	location.href = "data/excelDetOrdenes.php?idActa="+idActa+"&idOrd="+idOrd+"&idActaOrden="+idActaOrden;
    }

}
;

function imprimeActasExcel() {
    //window.open('data/imprimeOrdenes.php?id='+id,'name','width=600,height=400');
    var idContrato = $('#txtContrato').val();
    var ver = $('#verificaActas').val();
    if (ver === 'reg') {
        location.href = "data/excelActas.php?idContrato="+idContrato;   
    }

}
;
function imprimeMultasExcel() {
    //window.open('data/imprimeOrdenes.php?id='+id,'name','width=600,height=400');
    var idActa = $('#txtActaMulta').val();
    var ver = $('#verificaMulta').val();
    if (ver === 'reg') {
       /* $.ajax({
            url: 'data/excelMultas.php',
            type: 'post',
            // dataType: 'json',
            data: {
                idActa: idActa
            },
            success: function (data) {
                $('#modal-msg').find('.modal-title').text('Generacion de Actas');
                $('#modal-msg').find('#msg-body').text('Archivo Generado Satisfactoriamente');
                $('#modal-msg').modal('show');

            },
            error: function () {
                eMsg(72);
            }
        });*/
	location.href = "data/excelMultas.php?idActa="+idActa;
    }

}
;

function imprimeDetOrdPdf() {
    var idActaOrden = $('#impIdActaOrdenes').val();
    var ord = $('#impIdOrden').val();
    var idActa = $('#impIdActa').val();
    $('#modal-formatoReporte').modal('hide');
    window.open('data/imprimeDetOrdenes.php?idActaOrden=' + idActaOrden + '&ord=' + ord + '&idActa=' + idActa, 'name', 'width=600,height=400');

}
;

function imprimePDF() {
    if ($('#impOpcion').val() === 'CERTIFICADO') {
        imprimeCertPDF();
    } else {
        if ($('#impOpcion').val() === 'ORDENES') {
            imprimeDetOrdPdf();
        }
    }
}

function imprimeExcel() {
    if ($('#impOpcion').val() === 'CERTIFICADO') {
        imprimeCertEXCEL();
    } else {
        if ($('#impOpcion').val() === 'ORDENES') {
            //imprimeDetOrdPdf();
            imprimeDetOrdsExcel();
        }
    }
}

function imprimeCertPDF() {
    var idCont = $('#txtContrato').val();
    var idActa = $('#impIdActa').val();
    var numContrato = $('#impNumContrato').val();
    var contratista = $('#impContratista').val();
    var fechaInicio = $('#impFechaInicio').val();
    $('#modal-formatoReporte').modal('hide');
    window.open('data/imprimeCertificadoPdf.php?idCont=' + idCont + '&idActa=' + idActa + '&numContrato=' + numContrato + '&contratista=' + contratista + '&fechaInicio=' + fechaInicio, 'name', 'width=600,height=400');
    //alert (contratista);
}

function imprimeCertEXCEL() {
    var idCont = $('#txtContrato').val();
    var idActa = $('#impIdActa').val();
    var numContrato = $('#impNumContrato').val();
    var contratista = $('#impContratista').val();
    var fechaInicio = $('#impFechaInicio').val();
    $('#modal-formatoReporte').modal('hide');
   /* $.ajax({
        url: 'data/imprimeCertificadoExcel.php',
        type: 'post',
        data: {
            idCont: idCont,
            idActa: idActa,
            numContrato: numContrato,
            contratista: contratista,
            fechaInicio: fechaInicio
        },
        success: function (data) {
            $('#modal-msg').find('.modal-title').text('');
            $('#modal-msg').find('#msg-body').text('Archivo Generado Satisfactoriamente');
            $('#modal-msg').modal('show');
        },
        error: function () {
            eMsg(72);
        }
    });*/
   location.href = "data/imprimeCertificadoExcel.php?idCont="+idCont+"&idActa="+idActa+"&numContrato="+numContrato+"&contratista="+contratista+"&fechaInicio="+fechaInicio;

}
/*function imprimeCert(idActa,numContrato,contratista){
 var idCont = $('#txtContrato').val();
 window.open('data/imprimeCertificado.php?idCont='+idCont+'&idActa='+idActa+'&numContrato='+numContrato+'&contratista='+contratista,'name','width=600,height=400');
 //alert (contratista);
 
 }*/
function cambiarEstado(idActa, estado) {
    var accion = '';

    if (estado === 'A') {
        accion = 'Seguro que desea Cerrar el Acta';
    } else {
        accion = 'Seguro que desea Activar el Acta';
    }
    $('#modal-confirm').find('.modal-title').text(accion);
    $('#idAccion').val(idActa);
    $('#valor').val(estado);
    $('#accion-confir').val('CE');
    $('#modal-confirm').modal('show');

}

function generaMultAut(idActa, estado) {
    var idActa = idActa;
    if (estado === 'A') {
        $.ajax({
            url: 'data/generaMultaAutomatica.php',
            type: 'post',
            dataType: 'json',
            data: {
                idActa: idActa
            },
            success: function (data) {
                // console.log(data);
                if (data.Error === null || data.Error === '') {
                    $('#modal-nuevaMulta').modal('hide');
                    $('#modal-msg').find('.modal-title').text('Generacion de multas Automáticas');
                    $('#modal-msg').find('#msg-body').text('Proceso generado satisfactoriamente');
                    $('#modal-msg').modal('show');
                    obtieneActas();
                } else {
                    $('#modal-nuevaMulta').modal('hide');
                    $('#modal-msg').find('.modal-title').text('Generacion de multas Automáticas');
                    $('#modal-msg').find('#msg-body').text(data.Error);
                    $('#modal-msg').modal('show');
                }
            },
            error: function () {
                eMsg(26);
            }
        });

    } else {
        $('#modal-msg').find('.modal-title').text('');
        $('#modal-msg').find('#msg-body').text('No se pueden generar actas que se encuentran cerradas');
        $('#modal-msg').modal('show');
    }
}

function imprimeOrdsPdf() {
    //window.open('data/imprimeOrdenes.php?id='+id,'name','width=600,height=400');
    var idActa = $('#txtActa').val();
    var ver = $('#verificaOrdenes').val();
    if (ver === 'reg') {
        window.open('data/imprimeOrdenes.php?idActa=' + idActa, 'name', 'width=600,height=400');
        //window.open('data/print.php?id='+id,'name','width=600,height=400');
    }

}
;

function imprimeActasPdf() {
    //window.open('data/imprimeOrdenes.php?id='+id,'name','width=600,height=400');
    var id = $('#txtContrato').val();
    var ver = $('#verificaOrdenes').val();
    //if (ver==='reg') {
    window.open('data/imprimeActas.php?id=' + id, 'name', 'width=600,height=400');
    //}

}
;

function imprimeMultasPdf() {
    var id = $('#txtActaMulta').val();
    var ver = $('#verificaMulta').val();
    //if (ver==='reg') {
    window.open('data/imprimeMultas.php?id=' + id, 'name', 'width=600,height=400');
    // }

}
;

function visualizarOrden(idDetOrden) {

    $.ajax({
        url: 'data/visualizarOrden.php',
        type: 'post',
        data: {
            idDetOrden: idDetOrden
        },
        success: function (data) {
            $('#table-det-ordenes').html(data);
            // console.log(data);
            $('#modal-orden').find('.modal-title').text('Visualiza Orden');
            $('#modal-orden').modal('show');
        },
        error: function () {
            eMsg(72);
        }
    });
    //visualizaOrden(idDetOrden);
}//end editType

$('#obtenerOrdenes').click(function (event) {

    var idActa = $('#idActa').val();

    $.ajax({
        url: 'data/obtieneOrdenes.php',
        type: 'post',
        data: {
            idActa: idActa
        },
        success: function (data) {
            $('#table-ordenes').html(data);
            var ver = $('#verificaOrdenes').val();
            if (ver === 'reg') {
                $('#table-ordenes').show();
                $('#imprimeOrdenes').removeAttr('hidden');
            } else {
                $('#table-ordenes').hide();
                $('#imprimeOrdenes').attr('hidden', 'hidden');
                $('#modal-msg').find('.modal-title').text('');
                $('#modal-msg').find('#msg-body').text('No existe información para el de Acta Consultada');
                $('#modal-msg').modal('show');
            }
            $("#txtActa").val(idActa);



        },
        error: function () {
            eMsg(128);
        }
    });

});

$('#obtenerActas').click(function (event) {
//event.preventDefault();
    var idContrato = $('#idContrato').val();

    $.ajax({
        url: 'data/obtieneActas.php',
        type: 'post',
        data: {
            idContrato: idContrato
        },
        success: function (data) {
            $('#table-actas').html(data);
            var ver = $('#verificaActas').val();
            if (ver === 'reg') {
                $('#table-actas').show();
                $('#imprimeActas').removeAttr('hidden');
                // $('.anchActas').css({ 'width':'15px'});
            } else {
                $('#table-actas').hide();
                $('#modal-msg').find('.modal-title').text('');
                $('#modal-msg').find('#msg-body').text('No existe informacion para el Contrato Consultado');
                $('#modal-msg').modal('show');
                $('#imprimeActas').attr('hidden', 'hidden');
            }
            $("#txtContrato").val(idContrato);

        },
        error: function () {
            eMsg(128);
        }
    });

});

function obtieneActas() {
//event.preventDefault();
    var idContrato = $('#idContrato').val();
    $.ajax({
        url: 'data/obtieneActas.php',
        type: 'post',
        data: {
            idContrato: idContrato
        },
        success: function (data) {
            $('#table-actas').html(data);
            $('#table-actas').show();
            $('#imprimeActas').removeAttr('hidden');
            $("#txtContrato").val(idContrato);

        },
        error: function () {
            eMsg(128);
        }
    });


}

$('#obtenerMultas').click(function (event) {

    var idActa = $('#mIdActa').val();
    $("label[for='me']").text("");
    verificaActa(idActa);
    if ($('#existeActa').val() !== 'false') {
        // var estado=$('#existeActa').val();
        $.ajax({
            url: 'data/obtieneMultas.php',
            type: 'post',
            async: false,
            data: {
                idActa: idActa
            },
            success: function (data) {

                $('#table-multas').html(data);

                var ver = $('#verificaMulta').val();
                if (ver === 'reg') {
                    $('#table-multas').show();
                    $('#btCrear').show();
                    $('#imprimeMultas').removeAttr('hidden');
                } else {
                    // $('#btCrear').hide(); 
                    $('#btCrear').show();
                    $('#table-multas').hide();
                    $('#modal-msg').find('.modal-title').text('');
                    $('#modal-msg').find('#msg-body').text('No existe información para el Acta Consultada');
                    $('#modal-msg').modal('show');
                    $('#imprimeMultas').attr('hidden', 'hidden');
                }

                $("#txtActaMulta").val(idActa);

            },
            error: function () {
                eMsg(128);
            }
        });

        if ($('#existeActa').val() !== 'A') {
            $("label[for='me']").text("El acta se encuentra cerrada");
            $('#mensaje').removeAttr('hidden');
            $('#btCrear').hide();
            $('.anchura').css({'width': '10px'});
            /*$(".delMulta").css("visibility","hidden");
             $(".editarMul").css("visibility","hidden");
             //$("#anchura").css("width:50px") ;
             $('.anchura').css({ 'width':'10px'});
             $('.anchura').css({ 'align':'center'});*/

        } else {
            $('#mensaje').attr('hidden', 'hidden');
            $('#btCrear').show();
            $('.anchura').css({'width': '100px'});
            /* $(".delMulta").css("visibility","visible");
             $(".editarMul").css("visibility","visible");
             $('.anchura').css({ 'width':'100px'});
             $('.anchura').css({ 'align':'center'});*/
        }


    }

});

function verificaActa(idActa) {
    $('#existeActa').val('');
    $.ajax({
        url: 'data/verificaActa.php',
        type: 'post',
        dataType: 'json',
        async: false,
        data: {
            idActa: idActa
        },
        success: function (data) {
            if (data === false) {
                $('#existeActa').val('false');
                $('#modal-msg').find('.modal-title').text('');
                $('#modal-msg').find('#msg-body').text('Còdigo de Acta no existe..');
                $('#modal-msg').modal('show');
                $('#table-multas').hide();
                $('#btCrear').hide();
                $('#imprimeMultas').attr('hidden', 'hidden');

            } else {
                //alert(data.fecha_cierre); 
                //var fecha_cierre=data.fecha_cierre;
                $('#existeActa').val(data.estado);
                //alert($('#existeActa').val());
                $('#btCrear').show();
                $('#imprimeMultas').removeAttr('hidden');

            }
        },
        error: function () {
            eMsg(128);
            $('#existeActa').val('false');
        }
    });
}
;

function refMulta(idActa) {
    $.ajax({
        url: 'data/obtieneMultas.php',
        type: 'post',
        data: {
            idActa: idActa
        },
        success: function (data) {
            $('#table-multas').html(data);
            $("#txtActaMulta").val(idActa);
            var ver = $('#verificaMulta').val();
            if (ver === 'reg') {
                $('#table-multas').show();
                $('#btCrear').show();
                $('#imprimeMultas').removeAttr('hidden');
            } else {
                $('#btCrear').show();
                $('#table-multas').hide();
                $('#imprimeMultas').attr('hidden', 'hidden');
            }

        },
        error: function () {
            eMsg(128);
        }
    });
}
;

function creaMulta() {
    //alert($("#fCierre").val());
    if ($("#aEstado").val() === 'A')
    {
        if ($('verificaMulta').val === 'reg')
        {
            var idActa = $('#mIdActa').val();
            $('#type-type').val('insertar');
            $('#nIdActa').val(idActa);
            //$('#nDescrip').val('Multa');
            $('#opciones').val('Multa');
            $('#numCantidad').val('');
            $('#txtObs').val('');
            $('#txtPorc').val('');
            $('#txtPorc').val('');
            $('#numValor').val('');
            $('#numTotal').val('');
            $('#modal-nuevaMulta').find('.modal-title').text('Ingresar Multa');
            $('#modal-nuevaMulta').modal('show');
            $('#numCantidad').removeAttr('disabled');
            $('#txtPorc').removeAttr('disabled');
            $('#txtObs').removeAttr('disabled');
            $('#txtPorc').removeAttr('disabled');
            $("#numValor").removeAttr('disabled');
            $("#guardarMuta").removeAttr('disabled');
            $('#opciones').removeAttr('disabled');
        } else {
            accionMultas('', 'I', '');
        }
    } else {
        if ($('verificaMulta').val === 'reg') {
            $('#modal-msg').find('.modal-title').text('');
            $('#modal-msg').find('#msg-body').text('No se puede ingresar multa, Acta se encuentra cerrada');
            $('#modal-msg').modal('show');
        } else {
            accionMultas('', 'I', '');
        }
    }

}

function formatoReporte(idActa, numContrato, contratista, idActaOrdenes, idOrden, fechaInicio, opcion) {
    if (opcion === 'CERTIFICADO') {
        $('#impIdActa').val(idActa);
        $('#impNumContrato').val(numContrato);
        $('#impContratista').val(contratista);
        $('#impOpcion').val(opcion);
        $('#impFechaInicio').val(fechaInicio);

    } else {
        if (opcion === 'ORDENES') {
            $('#impIdActa').val(idActa);
            $('#impIdActaOrdenes').val(idActaOrdenes);
            $('#impIdOrden').val(idOrden);
            $('#impOpcion').val(opcion);
        }
    }

    $('#modal-formatoReporte').modal('show');
}

function accionMultas(idActaRubro, tipo, multa) {
    $('#divDesc').removeAttr('hidden');
    $('#divPorc').removeAttr('hidden');
    $('#divCant').removeAttr('hidden');
    $('#divTotal').removeAttr('hidden');
    $('#automatica').attr('hidden', 'hidden');
    if (tipo === 'V') {

        var idActa = $('#txtActaMulta').val();
        $.ajax({
            url: 'data/obtieneRubroMulta.php',
            type: 'post',
            dataType: 'json',
            data: {
                idActaRubro: idActaRubro
            },
            success: function (data) {

                $('#type-type').val('ver');
                $('#nIdActa').val($('#txtActaMulta').val());
                //$('#nDescrip').val(data.DESCRIPCION);
                $('#numCantidad').val(data.CANTIDAD);
                $('#txtObs').val(data.OBSERVACION);
                $('#txtPorc').val(data.PORCENTAJE);
                $('#opciones').val(data.DESCRIPCION);
                $('#numValor').val(data.VALOR_UNITARIO);
                $('#numTotal').val(data.VALOR_TOTAL);
                $('#modal-nuevaMulta').find('.modal-title').text('Visualizar Multa');
                $('#modal-nuevaMulta').modal('show');
                $('#numCantidad').attr('disabled', 'disabled');
                $('#txtObs').attr('disabled', 'disabled');
                $('#txtPorc').attr('disabled', 'disabled');
                $("#numValor").attr('disabled', 'disabled');
                $("#guardarMuta").attr('disabled', 'disabled');
                $("#guardarMuta").hide();
                $('#opciones').attr('disabled', 'disabled');
            },
            error: function () {
                eMsg(72);
            }
        });
        if (multa === 'AUTOMATICA') {
            $.ajax({
                url: 'data/obtineMultasAutomaticas.php',
                type: 'post',
                data: {
                    idActa: idActa,
                    idActaRubro: idActaRubro
                },
                success: function (data) {
                    $('#automatica').removeAttr('hidden');
                    $('#table-automatica').html(data);
                    $('#divDesc').attr('hidden', 'hidden');
                    $('#divPorc').attr('hidden', 'hidden');
                    $('#divCant').attr('hidden', 'hidden');
                    $('#divTotal').attr('hidden', 'hidden');
                },
                error: function () {
                    eMsg(72);
                }
            });
        }



    }/*else if (fechaCierre!=='' && tipo ==='E') {
     $('#modal-msg').find('.modal-title').text('Verificacion Editar Multa');
     $('#modal-msg').find('#msg-body').text('No se puede Editar la multa, Acta se encuentra Cerrada');
     $('#modal-msg').modal('show');
     
     } */else if (/*fechaCierre==='' && */tipo === 'E') {
        if (multa === 'AUTOMATICA') {
            $('#modal-msg').find('.modal-title').text('Verificacion Editar Multa');
            $('#modal-msg').find('#msg-body').text('No se pueden modificar multas Automaticas');
            $('#modal-msg').modal('show');
        } else {
            $.ajax({
                url: 'data/obtieneRubroMulta.php',
                type: 'post',
                dataType: 'json',
                data: {
                    idActaRubro: idActaRubro
                },
                success: function (data) {

                    $('#type-type').val('editar');
                    $('#nIdActa').val($('#txtActaMulta').val());
                    $('#txtIdRubroActa').val(data.ID_RUBRO_ACTA);
                    //$('#nDescrip').val(data.DESCRIPCION);
                    $('#opciones').val(data.DESCRIPCION);
                    $('#numCantidad').val(data.CANTIDAD);
                    /**/ $('#txtObs').val(data.OBSERVACION);
                    $('#txtPorc').val(data.PORCENTAJE);
                    $('#numValor').val(data.VALOR_UNITARIO);
                    $('#numTotal').val(data.VALOR_TOTAL);
                    $('#modal-nuevaMulta').find('.modal-title').text('Editar Multa');
                    $('#modal-nuevaMulta').modal('show');
                    $('#numCantidad').removeAttr('disabled');
                    $('#txtObs').removeAttr('disabled');
                    $('#txtPorc').removeAttr('disabled');
                    $("#numValor").removeAttr('disabled');
                    $("#guardarMuta").removeAttr('disabled');
                    $("#guardarMuta").show();
                    $('#opciones').removeAttr('disabled');

                },
                error: function () {
                    eMsg(72);
                }
            });

        }
    } else if (tipo === 'I') {
        var idActa = $('#mIdActa').val();
        /* $.ajax({
         url: 'data/obtFechaCierreActa.php',
         type: 'post',
         dataType: 'json',
         data: {
         idActa:idActa
         },
         success: function (data) {
         
         var fecha_cierre=data.fecha_cierre;
         if (fecha_cierre === null){
         fecha_cierre = '';
         }
         if (data===false){
         $('#modal-msg').find('.modal-title').text('Verifica Acta');
         $('#modal-msg').find('#msg-body').text('El Acta no existe');
         $('#modal-msg').modal('show');
         $('#btCrear').hide();
         }else if(fecha_cierre !== ''  ){
         $('#modal-msg').find('.modal-title').text('Verifica Acta');
         $('#modal-msg').find('#msg-body').text('No se puede ingresar multa, Acta se encuentra cerrada');
         $('#modal-msg').modal('show');
         }else{*/
        $('#type-type').val('insertar');
        $('#nIdActa').val(idActa);
        //$('#nDescrip').val('Multa');
        $('#opciones').val('Multa');
        $('#numCantidad').val('');
        $('#txtObs').val('');
        $('#txtPorc').val('');
        $('#numValor').val('');
        $('#numTotal').val('');
        $('#modal-nuevaMulta').find('.modal-title').text('Ingresar Multa');
        $('#modal-nuevaMulta').modal('show');
        $('#numCantidad').removeAttr('disabled');
        $('#txtObs').removeAttr('disabled');
        $('#txtPorc').removeAttr('disabled');
        $("#numValor").removeAttr('disabled');
        $("#guardarMuta").removeAttr('disabled');
        $('#opciones').removeAttr('disabled');

        /*  }
         
         },
         error: function(){
         eMsg(128);
         }
         });*/


    }/*
     else{
     $('#modal-msg').find('.modal-title').text('Verificacion Ingreso Multa');
     $('#modal-msg').find('#msg-body').text('No se puede ingresar la multa, debido a que existe una fecha de corte');
     $('#modal-msg').modal('show');
     }*/
}
;

function salirMulta() {
    $('#modal-nuevaMulta').modal('hide');
}

function nuevaMulta2(idActa, fechaCorte) {

    if (fechaCorte === '') {
        //alert('1');
        //document.location="multas.php";
        //alert(idActa);
        $.ajax({
            url: 'multas.php',
            type: 'post',
            data: {
                idActa: idActa
            },
            success: function (data) {
                // alert(data);

                /*   $('#table-multas').html(data);
                 //  $('#actaMulta').val(idActa);
                 document.location="multas.php";
                 */  alert(1);
                /*
                 $('#table-multas').html(data);
                 $('#actaMulta').val(idActa);
                 alert(data);
                 
                 /*  $("#txtContrato").val(idContrato);
                 $("#idContrato").val('');*/

            },
            error: function () {
                eMsg(128);
            }
        });

    } else {
        $('#modal-msg').find('.modal-title').text('Verificacion Ingreso Multa');
        $('#modal-msg').find('#msg-body').text('No se puede ingresar la multa, debido a que existe una fecha de corte');
        $('#modal-msg').modal('show');
    }

}
;

function validateDecimal() {
    var numero = $('#numCantidad').val();
    //alert('prueba');
    if (!/^([0-9])*$/.test(numero))
        alert("El valor " + numero + " no es un número");
}

var valid = true;

function eMsg(message) {
    alert('Error: L' + message + '+');
}//end eMsg
//laundry type
$('#newType').click(function (event) {
    /* Act on the event */
    $('#type-type').val('insert');
    $('#type').val('');
    $('#price').val('');
    $('#modal-lau-type').find('.modal-title').text('New Laundry Type');
    $('#modal-lau-type').modal('show');
});

$(document).on('submit', '#nuevaMulta', function (event) {
    event.preventDefault();
    /* Act on the event */
    //var type_id = $('#type-id').val();
    var idActa = $('#nIdActa').val();
    var idRubroActa = $('#txtIdRubroActa').val();
    var descrip = $('#opciones').val();

    if (descrip === 'Multa') {
        var tipoItem = 'MU';
        var idItem = 'MUL';
        //var descrip = $('#nDescrip').val();

    } else {
        if (descrip === 'Descuento') {
            var tipoItem = 'DE';
            var idItem = 'DES';

        }

    }

    var obs = $('#txtObs').val();
    var porcen = $('#txtPorc').val();
    var cantidad = $('#numCantidad').val();
    var unidad = 'UNI';
    var tipoEjecucion = 'M';
    var valorUnitario = $('#numValor').val();
    var total = $('#numTotal').val();
    var tipoEjecucion = 'M';

    var type_type = $('#type-type').val();
    if (type_type === 'insertar') {
        //alert(tipoItem);
        //alert(idItem);
        // alert(descrip);
        $.ajax({
            url: 'data/insertaMulta.php',
            type: 'post',
            dataType: 'json',
            data: {
                idActa: idActa,
                tipoItem: tipoItem,
                idItem: idItem,
                descrip: descrip,
                obs: obs,
                porcen: porcen,
                cantidad: cantidad,
                unidad: unidad,
                valorUnitario: valorUnitario,
                total: total,
                tipoEjecucion: tipoEjecucion
            },
            success: function (data) {
                // console.log(data);

                if (data.valid === valid) {
                    refMulta($('#txtActaMulta').val());
                    $('#modal-nuevaMulta').modal('hide');
                    $('#modal-msg').find('.modal-title').text('Ingresar Multa');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                }
            },
            error: function () {
                eMsg(26);
            }
        });



    } else if (type_type === 'editar') {

        $.ajax({
            url: 'data/editarMulta.php',
            type: 'post',
            dataType: 'json',
            data: {
                idRubroActa: idRubroActa,
                tipoItem: tipoItem,
                idItem: idItem,
                descrip: descrip,
                obs: obs,
                cantidad: cantidad,
                valorUnitario: valorUnitario,
                total: total,
                porcen: porcen
            },
            success: function (data) {
                if (data.valid === valid) {
                    refMulta($('#txtActaMulta').val());
                    $('#modal-nuevaMulta').modal('hide');
                    $('#modal-msg').find('.modal-title').text('Actualizar Multa');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');

                }


            },
            error: function () {
                eMsg(58);
            }
        });
    } else {
        //where magic begins .wahaha
    }
});

function eliminaMulta(idMulta, multa) {
    if (multa === 'AUTOMATICA') {
        $('#modal-msg').find('#msg-body').text('No se pueden eliminar multas Automaticas');
        $('#modal-msg').modal('show');
    } else {
        $('#modal-confirm').find('.modal-title').text('Seguro que desea Eliminar la Multa');
        $('#idAccion').val(idMulta);
        $('#accion-confir').val('E');
        $('#modal-confirm').modal('show');
    }
}

function cambiarEstado(idActa, estado, fechaCorte, fechaCierre) {
    var accion = '';
    var bandera = true;
    if (estado === 'C') {
        var fecha = new Date();
        var fechaActual = new Date();
        fechaActual = ((fecha.getFullYear() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getDate() + ' ' + fecha.getHours() + ":" + fecha.getMinutes() + ":" + fecha.getSeconds()));
        //alert(fechaCorte);
        // alert(fechaActual);
        if (Date.parse(fechaCorte) < Date.parse(fechaActual)) {
            //  alert('menor');
            bandera = false;
            $('#modal-msg').find('#msg-body').text('No se puede reaperturar el acta, la fecha de corte es menor a la de reapertura');
            $('#modal-msg').modal('show');

        } else {
            //   alert('mayor');
            bandera = true;
        }
    }

    if (bandera) {
        if (estado === 'A') {
            accion = 'Seguro que desea Cerrar el Acta';
        } else {
            accion = 'Seguro que desea Activar el Acta';
        }
        $('#modal-confirm').find('.modal-title').text(accion);
        $('#idAccion').val(idActa);
        $('#valor').val(estado);
        $('#accion-confir').val('CE');
        $('#modal-confirm').modal('show');
    }

}

$('#confirmacion').click(function (event) {
    /* Act on the event */
    if ($('#accion-confir').val() === 'E') {
        var idRubroActa = $('#idAccion').val();
        $.ajax({
            url: 'data/eliminarMulta.php',
            type: 'post',
            dataType: 'json',
            data: {
                idRubroActa: idRubroActa
            },
            success: function (data) {
                //alert(data.msg);
                if (data.valid) {
                    //  alert(123);
                    refMulta($('#txtActaMulta').val());
                    $('#modal-confirm').modal('hide');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                }
            },
            error: function () {
                eMsg(211);
            }
        });

    } else {
        if ($('#accion-confir').val() === 'CE') {
            var idActa = $('#idAccion').val();
            var estado = '';
            if ($('#valor').val() === 'A') {
                estado = 'C';
            } else {
                estado = 'A';
            }
            $.ajax({
                url: 'data/cambiarEstadoActa.php',
                type: 'post',
                dataType: 'json',
                data: {
                    idActa: idActa,
                    estado: estado
                },
                success: function (data) {
                    //alert(data.msg);
                    if (data.valid) {
                        //  alert(123);
                        obtieneActas();
                        $('#modal-confirm').modal('hide');
                        $('#modal-msg').find('#msg-body').text(data.msg);
                        $('#modal-msg').modal('show');
                    }
                },
                error: function () {
                    eMsg(211);
                }
            });


        }


    }
});//end if confirm yes is click
//if confirm button yes is click
$('#confirm-yes').click(function (event) {
    /* Act on the event */
    var confirmType = $('#confirm-type').val();
    if (confirmType == 'delete-laundry') {
        //delete laun
        $('input[type=checkbox]:checked').each(function (index) {
            var id = $(this).val();
            $.ajax({
                url: 'data/delete_laundry.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function (data) {
                    // im soo sleepy
                },
                error: function () {
                    eMsg(211);
                }
            });
        });//end check array
        $('#modal-confirm').modal('hide');
        $('#modal-msg').find('#msg-body').text('Deleted Successfully!');
        $('#modal-msg').modal('show');
    } else if (confirmType == 'claim-laundry') {
        $('input[type=checkbox]:checked').each(function (index) {
            var id = $(this).val();
            $.ajax({
                url: 'data/claim_laundry.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function (data) {
                    // soo  sleepy
                },
                error: function () {
                    eMsg(258);
                }
            });
        });//end check array
        $('#modal-confirm').modal('hide');
        $('#modal-msg').find('#msg-body').text('Claim and paid Successfully!');
        $('#modal-msg').modal('show');
    } else {
        //sooo fucking sleepy
    }
    all_laundry();
});//end if confirm yes is click
//edit laundry basin na sayop
function editLaundry(laun_id) {

    $('#laun-type').val('edit');
    //fill
    $.ajax({
        url: 'data/get_laundry.php',
        type: 'post',
        dataType: 'json',
        data: {
            laun_id: laun_id
        },
        success: function (data) {
            // console.log(data);
            $('#laun-id').val(data.laun_id);
            $('#customer').val(data.customer_name);
            $('#priority').val(data.laun_priority);
            $('#weight').val(data.laun_weight);
            $('#newlaun-type').val(data.laun_type_id);
        },
        error: function () {
            eMsg(237);
        }
    });
    $('#modal-laun').find('.modal-title').text('Edit Laundry');
    $('#modal-laun').modal('show');
}//end editLaundry
//claim laundry
$('#claim').click(function (event) {
    /* Act on the event */
    var haveCheck = false;
    $('input[type=checkbox]:checked').each(function (index) {
        haveCheck = true;
    });

    if (haveCheck == false) {
        alert('Please check the row(s) that you want to claim.');
    } else {
        $('#confirm-type').val('claim-laundry');
        $('#modal-confirm').modal('show');
    }
});

$('#changePass').click(function (event) {
    /* Act on the event */
    $('#modal-pass').find('.modal-title').text('Cambiar Contraseña');
    $('#modal-pass').modal('show');
});

$(document).on('submit', '#form-change', function (event) {
    event.preventDefault();
    /* Act on the event */
    var pwd = $('#pwd').val();
    var pwd2 = $('#pwd2').val();
    if (pwd != pwd2) {
        alert("Password Not Match!");
    } else {
        //pass is match
        $.ajax({
            url: 'data/change_pass.php',
            type: 'post',
            dataType: 'json',
            data: {
                pwd: pwd
            },
            success: function (data) {
                if (data.valid == valid) {
                    $('#modal-pass').modal('hide');
                    $('#modal-msg').find('#msg-body').text(data.msg);
                    $('#modal-msg').modal('show');
                }
            },
            error: function () {
                eMsg(387);
            }
        });
    }
});


function jsRemoveWindowLoad() {
    // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();
 
}
 
function jsShowWindowLoad(mensaje) {
    //eliminamos si existe un div ya bloqueando
    jsRemoveWindowLoad();
   
    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información<br>Espere por favor";
 
    //centrar imagen gif
    var height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;
 
    //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;
 
    //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar
 
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    var imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div  style='color:#000;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>" + mensaje + "</div><img  height='30' src='dist/img/procesando.gif'></div>";
 
        //creamos el div que bloquea grande------------------------------------------
        var div = document.createElement("div");
        div.id = "WindowLoad"
        div.style.width = ancho + "px";
        div.style.height = alto + "px";
        $("body").append(div);
 
        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        var input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"
 
        //asignamos el div que bloquea
        $("#WindowLoad").append(input);
 
        //asignamos el foco y ocultamos el input text
        $("#focusInput").focus();
        $("#focusInput").hide();
 
        //centramos el div del texto
        $("#WindowLoad").html(imgCentro);
 
}

