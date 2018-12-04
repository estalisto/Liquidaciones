$(document).on('submit', '#frmRestablecer', function(event) {
   event.preventDefault();
   var email= $("#email").val();
   $("#mensaje").hide();
   $.ajax({
        url: 'data/recuperaClave.php',
        type: 'post',
        dataType: 'json',
        data: {
          email:email
        },
        success: function (data){
          // console.log(data);
          $("#mensaje").show();
          if(data.valid === true){
            //window.location = data.url;
            $("#mensaje").html(data.mensaje);
          }else{
            $("#mensaje").html(data.mensaje);
          }
        },
        error: function(jqXHR, textStatus, errorThrown){
            $("#mensaje").show();
           $("#mensaje").html('<div class="alert alert-warning">'+'error en la peticion ajax - recuperarClave.js'+' </div>');
        }
      });//end a req 
      $("#email").val('');
});

$(document).on('submit', '#formRecuperaClave', function(event) {
    event.preventDefault();
    var token = $('#token').val();
    var idUsuario = $('#idUsuario').val();
    var clave = $('#repcontrasenia').val();
    
    $.ajax({
        url: 'data/restableceClave.php',
        type: 'post',
        dataType: 'json',
        data: {
          token:token,
          idUsuario:idUsuario,
          clave:clave
        },
        success: function (data){
          if(data.valid === true){
            $('#modal-msg').find('#msg-body').text(data.mensaje);
	    $('#modal-msg').modal('show');
            $('#repcontrasenia').val('');
            $('#contrasenia').val('');
             //window.location = data.url;
            
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

$('#valida1').hide();
$('#valida2').hide();
$('#msg_info').hide();
$('#btnRestaurar').hide();

$('input[id=contrasenia]').keyup(function() {
     var pswd = $(this).val();
     var bandera = false;
        //validate the length
        if (pswd.length === 0 ){
            $('#contrasenia').css('background', 'transparent');
            $('#texto').css('color', 'transparent');
            $('#texto').val('');
            bandera = false;
        }else{    
        
        if ( pswd.length < 8 &&  pswd.length > 0 ) {
            console.log('entro rojo'); 
            $('#contrasenia').css('background-color', 'red');
            $('#texto').css('color', 'red');
            $('#texto').val('Clave Insegura');
            bandera = false;
            
        } else {
            bandera = true;
            $('#contrasenia').css('background-color', 'orange');
            $('#texto').css('color', 'orange');
            $('#texto').val('Clave Segura');
            if ( pswd.match(/[A-z]/)&& pswd.match(/\d/) && pswd.match(/[A-Z]/) ) {
              $('#contrasenia').css('background-color', '#30ca17');
              $('#texto').css('color', '#2f8249');
              $('#texto').val('Clave Muy Segura');
            } 
            
        }
    } 
    
    if ($('#repcontrasenia').val() === $('#contrasenia').val()&& bandera ===true ){
        $('#btnRestaurar').show();
    }else{
        $('#btnRestaurar').hide();
    }
    
 }).focus(function() {
        $('#valida1').show();
        $('#msg_info').show();
    
    }).blur(function() {
        $('#valida1').hide();
        $('#msg_info').hide();
    });


$('input[id=repcontrasenia]').keyup(function() {
     var pswd = $(this).val();
     var bandera = false;
        //validate the length
        if (pswd.length === 0 ){
            $('#repcontrasenia').css('background', 'transparent');
            $('#texto1').css('color', 'transparent');
            $('#texto1').val('');
            bandera=false;
        }else{    
        
        if ( pswd.length < 8 &&  pswd.length > 0 ) {
            console.log('entro rojo'); 
            $('#repcontrasenia').css('background-color', 'red');
            $('#texto1').css('color', 'red');
            $('#texto1').val('Clave Insegura');
            bandera=false;
            
        } else {
            bandera=true;
            $('#repcontrasenia').css('background-color', 'orange');
            $('#texto1').css('color', 'orange');
            $('#texto1').val('Clave Segura');
            if ( pswd.match(/[A-z]/)&& pswd.match(/\d/) && pswd.match(/[A-Z]/)) {
              $('#repcontrasenia').css('background-color', '#30ca17');
              $('#texto1').css('color', '#2f8249');
              $('#texto1').val('Clave Muy Segura');
            } 
            
        }
    }
    
    if ($('#repcontrasenia').val() === $('#contrasenia').val()&& bandera ===true ){
        $('#btnRestaurar').show();
    }else{
        $('#btnRestaurar').hide();
    }
    
 }).focus(function() {
        $('#valida2').show();
        $('#msg_info').show();
    
    }).blur(function() {
        $('#valida2').hide();
        $('#msg_info').hide();
    });    
    
