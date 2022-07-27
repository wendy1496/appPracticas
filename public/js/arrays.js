const tit = document.getElementById('titulo');
const fechaGrado = document.getElementById('fechaGrado');
const institucion = document.getElementById('institucion');
const cedula1 = document.getElementById('cedula');
const btnagregar = document.getElementById('agregar');
const guardar = document.getElementById('guardar');
let lista = document.getElementById('lista');
let titulos = [];
let array = [];
let arrayJson = "";


btnagregar.addEventListener('click', () => {
    titulos.push(
        {
            titulo:tit.value, 
            institucion: institucion.value, 
            fecha: fechaGrado.value, 
            cedula: cedula1.value
        }
        );
    array.push([titulo.value,  institucion.value, fechaGrado.value, cedula1.value] );
    lista.innerHTML = '';
    let stringTabla = `
        <thead>            
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Institución</th>
                <th scope="col">Fecha</th>
                <th scope="col"></th> 
            </tr>
        </thead>`;
		
	for (const dato of array) {
			let fila = `
		<tbody>
			<tr>
			<td>
            `;
			fila +=dato[0];
			fila += `
					</td>
          <input type="hidden" name="titulo[]" value="`;fila +=dato[0]; fila +=`">
          <td>
			`;
			fila += dato[1];
      fila += `
					</td>
          <input type="hidden" name="institucion[]" value="`;fila +=dato[1]; fila +=`">
          <td>
			`;
			fila += dato[2];
      fila += `
					</td>
          <input type="hidden" name="fechaGrado[]" value="`;fila +=dato[2]; fila +=`">
          <td>
          <span class="btn btn-danger puntero2 ocultar2" ><i class="fas fa-trash"></i></span>
          <input  type="hidden" name="cedula[]" value="`;fila +=dato[3]; fila +=`">
          </td>

			`;
			fila += `
				</tr>
		    </tbody>`;
			stringTabla += fila;
			
			let lista = document.getElementById('lista');
			lista.innerHTML = stringTabla;
		}
        arrayJson=JSON.stringify(titulos);
        console.log(arrayJson);
	});

$(document).on('click', '.borrar', function(event) {
  event.preventDefault();
  $(this).closest('tr').remove();
});

guardar.addEventListener('click', () => {
    jQuery.ajax({
        url: "../../controlador/titulo.php",
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize()
       })
       
    });
    


                          