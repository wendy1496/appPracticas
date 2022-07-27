$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: '../../controlador/listarComponentes2.php'
    })
    .done(function(listas_componentes){
      $('#dependencia').html(listas_componentes)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las listas componentes')
    })
  
    $('#dependencia').on('change', function(){
      var dependencia = $('#dependencia').val()
      $.ajax({
        type: 'POST',
        url: '../../controlador/listarRolComponente.php',
        data: {'dependencia': dependencia}
      })
      .done(function(listas_componentes){
        $('#rolcomponente_id').html(listas_componentes)
      })
      .fail(function(){
        alert('Hubo un errror al cargar la lista de contratista')
      })
    })
  
  })


  $(obtener_registros());

function obtener_registros(datos)
{
	$.ajax({
		url : '../../controlador/buscarComponente.php',
		type : 'POST',
		dataType : 'html',
		data : { datos: datos },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});


