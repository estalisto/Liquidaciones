/*global google */
   google.charts.load('current', {'packages':['corechart']});
   

$(window).resize(function(){
    
estadistico(0,0);
// drawChart2();
});

function estadistico(ancho,alto) {
    
   // google.charts.setOnLoadCallback(drawChart);
     var barsVisualization;
    if ($("#idContrato").val() > 0 ){
        var idContrato=$("#idContrato").val();  
        $.ajax({
        url: 'data/cuentaEstadoActas.php',
        type: 'post',
        dataType: 'json',
        data: {
          idContrato:idContrato
        },
        success: function (data){
          // console.log(data);
          if(data.valid === true){
             var par = google.visualization.arrayToDataTable([
                ['Estados', 'Estados por actas'],
                ['Cerradas',    parseInt(data.Cerradas)],
                ['Activas',     parseInt(data.Activas)]                
              ]);
                var options = {
                     'width':ancho, 
                     'height':alto,
                      is3D: true,
                };
                var chart = new google.visualization.PieChart(document.getElementById('generalActas'));
                chart.draw(par, options);
                
                
                
                $.ajax({
                    url: 'data/valorGeneradoActas.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                      idContrato:idContrato
                    },
                    success: function (data){
                        var data1 = new google.visualization.DataTable();
                        var Nombre='Acta ';
                        var color=null;
                        data1.addColumn('string', 'Acta');
                        data1.addColumn('number', 'Valor');
                        data1.addColumn({type:'string', role:'style'});
                        data1.addColumn({type:'string', role: 'annotation'});
                        
                        $.each(data, function(i, item) {
                            if (item.estado === 'CERRADA'){
                                color='blue';
                            }else{
                                color='red';
                            }
                                
                             data1.addRows([
                                            [Nombre.concat(item.id_Acta),parseFloat(item.valor_generado), color,(item.estado)],
                                          ]);
                        });
                        
                   
                        
                         barsVisualization = new google.visualization.ColumnChart(document.getElementById('detalleActas'));
                         barsVisualization.draw(data1, null);

                         google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
                         google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);

                          function barMouseOver(e) {
                             barsVisualization.setSelection([e]);
                            }

                            function barMouseOut(e) {
                              barsVisualization.setSelection([{'row': null, 'column': null}]);
                            }
                    },
                error: function(){
                   alert("Error Graficos detActas JQUERY");
                }
              });
          }
        },
        error: function(){
           alert("Error Graficos Actas JQUERY 1");
        }
      });
  }
}


// comentado por pase de kromero  -- se debe despues descomentar
/*
$.ajax({
        type: "POST",
        url: "data/obtieneContratos.php",
        success: function(response)
        {
            $('.selector-contratos select').html(response).fadeIn();
        }
});*/