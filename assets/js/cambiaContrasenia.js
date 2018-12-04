
$(document).on('submit', '#formCambiaClave', function(event) {
    event.preventDefault();
    var usuario=$('#usuarioSession').val();
    var clave = $('#repcontraseniaC').val();
    
    $.ajax({
        url: 'data/actualizaClave.php',
        type: 'post',
        dataType: 'json',
        data: {
          idUsuario:usuario,
          clave:clave
        },
        success: function (data){
          if(data.valid === true){
            $('#modal-msg').find('#msg-body').text(data.mensaje);
	    $('#modal-msg').modal('show');
            $('#nuevaClave').attr('hidden', 'hidden');
            $('#repcontraseniaC').val('');
            $('#contraseniaActual').val('');
            $('#contraseniaC').val('');
            $('#repcontraseniaC').css('background', 'transparent');
            $('#contraseniaC').css('background', 'transparent');
            $('#btnRestaurarCambio').hide();
            
          }else{
            $('#modal-msg').find('#msg-body').text(data.mensaje);
	    $('#modal-msg').modal('show');
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
            $('#modal-msg').find('#msg-body').text('Error al momento de ejecutar el archivo recuperaClave.JS - '||jqXHR);
	    $('#modal-msg').modal('show');
        }
      });//end a req  */
    
   
});

$('#validaCambio1').hide();
$('#validaCambio2').hide();
$('#msg_infoCambio').hide();
$('#btnRestaurarCambio').hide();


$('input[id=contraseniaC]').keyup(function() {
     var pswd = $(this).val();
     var bandera = false;
        //validate the length
        if (pswd.length === 0 ){
            $('#contraseniaC').css('background', 'transparent');
            $('#textoC').css('color', 'transparent');
            $('#textoC').val('');
            bandera = false;
        }else{    
        
        if ( pswd.length < 8 &&  pswd.length > 0 ) {
            console.log('entro rojo'); 
            $('#contraseniaC').css('background-color', 'red');
            $('#textoC').css('color', 'red');
            $('#textoC').val('Clave Insegura');
            bandera = false;
            
        } else {
            bandera = true;
            $('#contraseniaC').css('background-color', 'orange');
            $('#textoC').css('color', 'orange');
            $('#textoC').val('Clave Segura');
            if ( pswd.match(/[A-z]/)&& pswd.match(/\d/) && pswd.match(/[A-Z]/) ) {
              $('#contraseniaC').css('background-color', '#30ca17');
              $('#textoC').css('color', '#2f8249');
              $('#textoC').val('Clave Muy Segura');
            } 
            
        }
    } 
    
    if ($('#repcontraseniaC').val() === $('#contraseniaC').val()&& bandera ===true ){
        $('#btnRestaurarCambio').show();
    }else{
        $('#btnRestaurarCambio').hide();
    }
    
 }).focus(function() {
        $('#validaCambio1').show();
        $('#msg_infoCambio').show();
    
    }).blur(function() {
        $('#validaCambio1').hide();
        $('#msg_infoCambio').hide();
    });


$('input[id=repcontraseniaC]').keyup(function() {
     var pswd = $(this).val();
     var bandera = false;
        //validate the length
        if (pswd.length === 0 ){
            $('#repcontraseniaC').css('background', 'transparent');
            $('#textoC1').css('color', 'transparent');
            $('#textoC1').val('');
            bandera=false;
        }else{    
        
        if ( pswd.length < 8 &&  pswd.length > 0 ) {
            console.log('entro rojo'); 
            $('#repcontraseniaC').css('background-color', 'red');
            $('#textoC1').css('color', 'red');
            $('#textoC1').val('Clave Insegura');
            bandera=false;
            
        } else {
            bandera=true;
            $('#repcontraseniaC').css('background-color', 'orange');
            $('#textoC1').css('color', 'orange');
            $('#textoC1').val('Clave Segura');
            if ( pswd.match(/[A-z]/)&& pswd.match(/\d/) && pswd.match(/[A-Z]/)) {
              $('#repcontraseniaC').css('background-color', '#30ca17');
              $('#textoC1').css('color', '#2f8249');
              $('#textoC1').val('Clave Muy Segura');
            } 
            
        }
    }
    
    if ($('#repcontraseniaC').val() === $('#contraseniaC').val()&& bandera ===true ){
        $('#btnRestaurarCambio').show();
    }else{
        $('#btnRestaurarCambio').hide();
    }
    
 }).focus(function() {
        $('#validaCambio2').show();
        $('#msg_infoCambio').show();
    
    }).blur(function() {
        $('#validaCambio2').hide();
        $('#msg_infoCambio').hide();
    });    
    


$('input[id=contraseniaActual]').keyup(function() {
     var pswd = $(this).val();
     var usuario=$('#usuarioSession').val();
     var bandera = false;
     
   //  alert (usuario+' - '+pswd);
     
     $.ajax({
              url: 'data/cambiarClave.php',
              type: 'post',
              dataType: 'json',
              data: {
                un:usuario,
                pw:pswd
              },
              success: function (data) {
                // console.log(data);
                if(data.valid === true){
                 $('#nuevaClave').removeAttr('hidden');
                }else{
                  $('#nuevaClave').attr('hidden', 'hidden');
                  $('#repcontraseniaC').val(''); 
                  $('#contraseniaC').val('');
                  $('#repcontraseniaC').css('background', 'transparent');
                  $('#contraseniaC').css('background', 'transparent');
                  $('#btnRestaurarCambio').hide();
                }
              },
              error: function(){
                alert('Error: Login.js L13+');
              }
            });//end a req
            

 }).focus(function() {
     //   $('#validaCambio1').show();
     //   $('#msg_infoCambio').show();
    
    }).blur(function() {
       // $('#validaCambio1').hide();
      //  $('#msg_infoCambio').hide();
    });