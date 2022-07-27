$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: '../../controlador/listarContratos.php'
    })
    .done(function(listas_contratos){
      $('#numContrato').html(listas_contratos)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas_contratos')
    })
  
    $('#numContrato').on('change', function(){
      var numContrato = $('#numContrato').val()
      $.ajax({
        type: 'POST',
        url: '../../controlador/listarComponentes.php',
        data: {'numContrato': numContrato}
      })
      .done(function(listas_contratos){
        $('#dependencia').html(listas_contratos)
      })
      .fail(function(){
        alert('Hubo un errror al cargar la lista de componentes')
      })
    })
  
  })


