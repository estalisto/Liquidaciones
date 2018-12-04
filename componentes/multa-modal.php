<multa-modal>

    <div id="multa-modal-nuevo" class="modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ingreso de Multas/Descuentos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table id="myTable-multaI" class="table  table-bordered table-hover table-striped" >
              <thead class="ingreso" style="background-color: #04496d; color: #b1dbf5; ">
                  <tr>
                      <th>DESCRIPCIÓN</th>
                      <th>OBSERVACIÓN</th>
                      <th>PORCENTAJE</th>
                      <th>CANTIDAD</th>
                      <th>VALOR</th>
                      <th>TOTAL</th>
                      <th>ACCIÓN</th>
                      
                  </tr>
                  <tr style="background-color: #04496d; color: #000; " >
                      <td><select id="opcionesM" class="ingreso">
                                <option>Multa</option>
                                <option>Descuento</option>
                             </select></td>
                      <td><input class="ingreso"  type="text"  id="txtObsM" required></td>
                      <td><input class="ingreso valores" type="number"  id="txtPorcM" required></td>
                      <td><input class="ingreso valores" onchange={actTotalMulta} oninput={actTotalMulta} type="number" min="1" step="any"  id="numCantidadM" required></td>
                      <td><input class="ingreso valores" type="number"  oninput={actTotalMulta}  onchange={actTotalMulta} min="0" step="any"  id="numValorM" required></td>
                      <td><input class="ingreso valores" type="number"   id="numTotalM" required disabled="disabled"></td>
                      <td><button id="btCrearRiot" onclick={agregar}  type="button" class="btn btn-success btn-sm  btn-responsive btninter right "> 
                          Agregar
                          </button>
                      </td>
                      
                  </tr>
              </thead>
              <tbody>
                  <tr each={data}>
                      <td>{opciones}</td> 
                      <td>{txtObs}</td> 
                      <td>{txtPorc}</td> 
                      <td>{numCantidad}</td> 
                      <td>{numValor}</td> 
                      <td>{numTotal}</td> 
                      <td><button  id="btCrearRiot" onclick={retirar}  type="button" class="btn btn-danger btn-sm  btn-responsive btninter right "> 
                          Quitar
                          </button>
                      </td>
                      
                  </tr>
              </tbody>
          </table>
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
       font-size: 12px
   
   }
   .valores{
       width: 90px
   }
  </style>
  

 <script>
    var self = this;
    self.ready = false;
    self.data=[]; // creo arreglo para guardar la data seleccionada
    console.log(opts.idActa);
    
    agregar(){
        var mensaje='';
        mensaje=validar();
        if (mensaje=='' || mensaje==null){
            var opciones=document.getElementById('opcionesM'),
                txtObs = document.getElementById('txtObsM'),
                txtPorc = document.getElementById('txtPorcM'),
                numCantidad= document.getElementById('numCantidadM'),
                numValor= document.getElementById('numValorM'),
                numTotal = document.getElementById('numTotalM');

            if (opciones.value==='Multa'){
                var tipoItem ='MU';
                var idItem = 'MUL';
            }else{
                if (opciones.value==='Descuento'){
                    var tipoItem ='DE';
                    var idItem = 'DES';
                }
            }
            var unidad =  'UNI';
            var tipoEjecucion = 'M';
            var multa = {
                idActa:opts.idActa,
                opciones:opciones.value,
                txtObs:txtObs.value,
                txtPorc:txtPorc.value,
                numCantidad: numCantidad.value,
                numValor: numValor.value,
                numTotal: numTotal.value,
                tipoItem: tipoItem,
                idItem: idItem,
                unidad:unidad,
                tipoEjecucion:tipoEjecucion            
            };
            self.data.push(multa);
            txtObs.value='';
            txtPorc.value='';
            numCantidad.value='';
            numValor.value='';
            numTotal.value='';
        }
    }
    
    retirar(e){
        var item = e.item; // obtenemos el item de la tabla
        var index= self.data.indexOf(item);
        self.data.splice(index,1); // borra el indice especificado
    }
    
    this.on('mount',function(){
      $('#multa-modal-nuevo').modal();
      
    })
   
    function validar(){
        var mensaje='';
       // alert(document.getElementById('opciones').value);
       if (document.getElementById('opcionesM').value =='' || document.getElementById('opcionesM').value == null) {
       //   alert('Debe Escoger Tipo de multa');
          mensaje='Debe Escoger Tipo de multa';
       }
       if (document.getElementById('txtObsM').value =='' || document.getElementById('txtObsM').value == null) {
       //   alert('Debe Ingresar la observación'); 
          if(mensaje == ''){
              mensaje='Ingrese la observación';
          }else{
              mensaje=mensaje+' - Ingrese la observación';
          }
            
       }
       if (document.getElementById('txtPorcM').value =='' || document.getElementById('txtPorcM').value == null) {
         if(mensaje == ''){
            mensaje='Ingrese el Porcentaje o verificar formato'; 
         }else{
            mensaje= mensaje+' - Ingrese el Porcentaje o verificar formato'; 
         }
       }
       if (document.getElementById('numCantidadM').value =='' || document.getElementById('numCantidadM').value == null) {
          if(mensaje == ''){
            mensaje='Ingrese cantidad o verificar el formato';  
          } else{
            mensaje= mensaje+' - Ingrese cantidad o verificar el formato';  
          }
        }   
       if (document.getElementById('numValorM').value =='' || document.getElementById('numValorM').value == null) {
            if(mensaje == ''){
              mensaje='Ingrese el valor o verificar el formato';  
            }else{
              mensaje= mensaje+' - Ingrese el valor o verificar el formato';  
            }
       }
       if (mensaje!=''){
           alert(mensaje);
           alert(1);
       }
       return mensaje;
    }
   
   
    guardar(){
      $.ajax({
	url: 'data/insertaMultaMasiva.php',
	type: 'post',
	dataType: 'json',
	data: {
            data: self.data
	},
	success: function (data) {
            if(data.valid === valid){
                refMulta();
                $('#multa-modal-nuevo').modal('hide');
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
   
   function refMulta() {
	$.ajax({
			url: 'data/obtieneMultas.php',
			type: 'post',
			data: {
                           idActa:opts.idActa
			},
			success: function (data) {
				$('#table-multas').html(data);
                                $("#txtActaMulta").val(opts.idActa);
                                var ver = $('#verificaMulta').val();
                                if(ver==='reg'){
                                    $('#table-multas').show();
                                    $('#btCrear').show();
                                    $('#imprimeMultas').removeAttr('hidden');
                                }else{
                                  $('#btCrear').show();
                                   $('#table-multas').hide();
                                   $('#imprimeMultas').attr('hidden','hidden');
                                }
                                                              
			},
			error: function(){
				eMsg(128);
			}
		});
    }
    
    actTotalMulta(){
        var cantida=$('#numCantidadM').val();
        var valor=$('#numValorM').val();

        if (valor===null){
            valor = 0;
        }

        if (cantida===null){
            cantida = 0;
        }

        var total = cantida*valor;
        $('#numTotalM').val(total.toFixed(3));
    }
  
  $(document).ready(function() {
        $('#myTable-multaI').DataTable();
    })
  </script>

</multa-modal>