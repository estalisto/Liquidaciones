$(document).ready(function () {
    $.ajax({
        url: 'data/consultaOrdenesWS.php',
        type: 'post',
        data: {

        },
        success: function (data) {
           
            $('#table-ordenes-ws').html(data);
            var ver = $('#verificaOrdenWS').val();
            if (ver === 'reg') {
                $('#table-ordenes-ws').show();
                ocultaDiv(true);
            } else {
                alert('No encontro Datos');
                $('table-ordenes-ws').hide();
            }
        },
        error: function () {
            alert('Error: obtiene parametros planillas.js L13+');
        }
    });//end a req*/



});

function obtieneDetalleOT(idOrden) {
 //   jsShowWindowLoad("Procesando la información<br>Espere por favor");
    $.ajax({
        data: {
            idOrden: idOrden//$("#idOrden").val()
        },
        type: "POST",
        url: "data/obtieneDetOrdenesWS.php",
        success: function (response)
        {   
            //bootbox.alert(response);
        //    jsRemoveWindowLoad();
            $('#myTable-detalle-ot').html(response);   
            ocultaDiv(false);
        }                   
    });
}



function ocultaDiv(bandera){
    
    if (bandera){
         $('#myTable-detalle-ot').attr('hidden', 'hidden');
         $('#table-ordenes-ws').removeAttr('hidden');
    }else{
        $('#table-ordenes-ws').attr('hidden', 'hidden');
         $('#myTable-detalle-ot').removeAttr('hidden');
    }
    
}

function imprimeOrdWSPdf(idOrden) {
 //   jsShowWindowLoad("Procesando la información<br>Espere por favor");
    $.ajax({
        data: {
            idOrden: idOrden//$("#idOrden").val()
        },
        type: "POST",
        url: "data/obtieneDetOrdenesWS.php",
        success: function (response)
        {   
            //bootbox.alert(response);
        //    jsRemoveWindowLoad();
            $('#myTable-detalle-ot').html(response);   
            ocultaDiv(false);
        }                   
    });
}



ocultaDiv(true);