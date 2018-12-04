
$(document).ready(function () {
    alert(1);
    $.ajax({
        url: 'data/obtieneUsuarios.php',
        type: 'post',
        data: {

        },
        success: function (data) {
            $('#table-usuarios').html(data);
            var ver = $('#verificaUsuarios').val();
            if (ver === 'reg') {
                $('#table-usuarios').show();
            } else {
                $('#table-usuarios').hide();
            }
        },
        error: function () {
            alert('Error: obtiene Usuario adminUsuario.js L13+');
        }
    });//end a req
});

/* global riot */
function creaUsuario() {
    /* riot.mount('usuario-modal', {
     
     }); */
    window.location = 'creacionUsuario.php';

}


function generarClave() {
    var randon = Math.round(Math.random() * (999 + 999) + 99);
    var fecha = new Date;
    var horas = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();
    var dia = fecha.getDate();
    var mes = (fecha.getMonth() + 1);
    var anio = fecha.getFullYear();
    var generado = '';

    // convierto 
    fecha = fecha.toString();
    dia = dia.toString();
    mes = mes.toString();
    anio = anio.toString();
    horas = horas.toString();
    minutos = minutos.toString();
    segundos = segundos.toString();
    randon = randon.toString();

    var aLetras = new Array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', dia, mes, anio, horas, 'l', 'm', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', minutos, segundos, randon);

    for (i = 0; i < 25; i++) {
        generado += aLetras[Math.floor(Math.random() * aLetras.length)];
    }
    generado = generado.substr(1, 64);
    $('#contrasenia').val(generado);

}

function validaCampo(tipo) {
    var cedula = '';
    var correo = '';
    var codigoUsuario = '';
    var usuario = '';
    alert(tipo);
    if (tipo === 'CEDULA') {
        cedula = $('#idIdentificacion').val();
    }
    if (tipo === 'CORREO') {
        correo = $('#correo').val();
    }
    if (tipo === 'CODIGOUSUARIO') {
        codigoUsuario = $('#codigoUsuario').val();
    }
    if (tipo === 'USUARIO') {
        usuario = $('#usuario').val();
    }
    
    $.ajax({
        url: 'data/validaCamposUsuarios.php',
        type: 'post',        
        dataType: 'json',
        data: {
            cedula        : cedula,
            correo        : correo,
            codigoUsuario : codigoUsuario,
            usuario       : usuario
        },
        success: function (data) {
           if (data.valid === true){
               alert(' encontro');
           }else{
               alert('no encontro');
           }
           
        },
        error: function () {
            alert('Error: obtiene Usuario adminUsuario.js L13+');
        }
    });
}