$(document).on('submit', '#form-login', function(event) {
        event.preventDefault();
        /* Act on the event */
        var un = $('#username').val();
        var pw = $('#password').val();
        if ($('#idAmbiente').val()!=='0'){
          var amb= $('#idAmbiente').val();
          $.ajax({
              url: 'data/user_login.php',
              type: 'post',
              dataType: 'json',
              data: {
                un:un,
                pw:pw,
                amb:amb
              },
              success: function (data) {
                // console.log(data);
                if(data.valid == true){
                  window.location = data.url;
                }else{
                  //alert('Usuario o Contraseña incorrectas!');
                  $('#modal-msg').find('.modal-title').text('');
                  $('#modal-msg').find('#msg-body').text('Usuario o Contraseña incorrectas!');
                  $('#modal-msg').modal('show');
                }
              },
              error: function(){
                alert('Error: Login.js L13+');
              }
            });//end a req
        }else{
            alert('Debe seleccionar el ambiente de trabajo');
        }
    
        /*alert(""); */
        
      });

$.ajax({
    type: "POST",
    url: "data/obtieneListaAmbientes.php",
    success: function (response)
    {
        $('.selector-ambiente select').html(response).fadeIn();
    }
});   
