<?php  
  include_once "header.php"
?>
<?php  
  include_once "header2.php"
?>
<?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();                            
          ?>

<div class="accordion container mb-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insertar datos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form  action="../../controlador/registroComponente.php" method="post" id="frmComponentes" class="img-form">
          <div class="overlay">
            <div class="container">
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se registraron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
              <h5 class="pt-2 pb-2 text-dark text-center">CREAR COMPONENTES</h5>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar Contrato</label>
                  <select class="form-select" aria-label="Default select example" name="numContrato"  required>
                    <option selected>Seleccione...</option>
                    <?php
          
        if($con){      
          $sql2="SELECT * FROM tblContratos";  
          $consulta=$con->prepare($sql2);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
                   
                    <option value="<?php echo $fila['numContrato'] ?>"><?php echo $fila['nombreContrato'] ?> - <?php echo $fila['numContrato'] ?> </option>
                    <?php
              }  
          }
        ?>
                  </select>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Componentes</label>
                  <input class="form-control text-secondary" type="" name="dependencia" placeholder="Dependencia" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Subcomponente</label>
                  <input class="form-control text-secondary" type="" name="subcomponente" placeholder="Subcomponente">
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-12">
                
                   <label for="formGroupExampleInput" class="form-label required text-dark">Presupuesto del componente</label>
                  <input class="form-control text-secondary" type="" id="presupuesto" name="presupuesto" placeholder="Presupuesto $" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">¿Requiere desplazamiento?</label><br>
                  <input class="form-check-input" type="radio" name="desplazamiento"  name="desplazamiento" value="Si" checked>
                   <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                   <input class="form-check-input" type="radio" name="desplazamiento" name="desplazamiento" value="No"> 
                   <label class="form-check-label" for="flexRadioDefault1"> No</label>
                </div>
              </div>
                <div class="row pt-2 text-center">
                  <div class="col-6">
                    <input type="hidden" id="componente_id" name="componente_id" value=""/>
                      <button class="btn btn-tdea" id="guardarDep">Guardar</button>
                  </div>
                </div> 
                        
            </div>
              </div>
              <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                <th>Contrato</th>
                <th>N° Contrato</th>
                <th>Componente</th>
                <th>Subcomponente</th>
                <th>Presupuesto</th>
                <th>Actualizar</th>
              </tr>
          </thead>
          <tbody>
            <?php
          
        if($con){      
          $sql="SELECT d.nombreContrato, d.numContrato, a.dependencia, a.subcomponente, a.presupuesto, a.componente_id FROM tblcomponentes a INNER JOIN tblcontratos d ON d.numContrato = a.numContrato";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['nombreContrato'] ?></td>
                <td><?php echo $fila['numContrato'] ?></td>
                <td><?php echo $fila['dependencia'] ?></td>
                <td><?php echo $fila['subcomponente'] ?></td>
                <td><?php echo $fila['presupuesto'] ?></td> 
                <td><a class="btn btn-primary" href="actualizarComponentes.php?componente_id=<?php echo $fila['componente_id'] ?>" id="actualizar"><i class="far fa-edit"></a></i></td>
              </tr>
              <?php
              }  
          }
        ?>
          </tbody>
          <tfoot>
              <tr>
                <th>Contrato</th>
                <th>N° Contrato</th>
                <th>Componente</th>
                <th>Subcomponente</th>
                <th>Presupuesto</th>
                <th>Actualizar</th>
              </tr>
          </tfoot>
      </table>
              
        </form >
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Crear rol de componentes
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form  action="../../controlador/registroRolComponente.php" method="post" id="frmComponentes" class="img-form">
          <div class="overlay">
            <div class="container">
      <?php 
                if(isset($_GET['mensaje2']) and $_GET['mensaje2'] == 'registrado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se registraron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
              <h5 class="pt-2 pb-2 text-dark text-center">CREAR ROL</h5>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar contrato</label>
                  <select id="numContrato"  name="numContrato" class="form-select" aria-label="Default select example">
                  </select>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Seleccionar Componente</label>
                  <select id="dependencia"  name="dependencia" class="form-select" aria-label="Default select example">
                  </select>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Rol</label>
                  <input class="form-control text-secondary" type="" name="rolDep" placeholder="Rol" required>
                </div>
              </div>               
               <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Perfil</label>
                  <textarea class="form-control" name="perfil" rows="3" required></textarea> 
                </div>
              </div>
               <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Objeto a Contratar</label>
                  <textarea class="form-control"  name="objetoContratar" rows="3" required></textarea> 
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-2 col-sm-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Honorarios (Mes)</label>
                  <input class="form-control text-secondary" type="number" name="honorarios" id="honorarios" placeholder="Honarios (INGRESE EL VALOR SIN PUNTOS NI COMAS)" required>
                </div>
                <div class="col-xl-2 col-sm-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Cantidad Personas</label>
                  <input class="form-control text-secondary" type="number" id="cantidadPersonas" name="cantidadPersonas" placeholder="Cantidad Personas" required>
                </div>
                <div class="col-xl-2 col-sm-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Tiempo (días)</label>
                  <input class="form-control text-secondary" type="number" id="tiempoDias" name="tiempoDias" placeholder="Tiempo (días)" required>
                </div>
              </div>
              <script>
                window.onchange = function calculo() 
{
	var honorarios = document.getElementById('honorarios').value;
	var valorDia = honorarios/30;
	document.getElementById('valorDia').value = valorDia;
	var cantidadPersonas = document.getElementById('cantidadPersonas').value;
	var tiempoDias = document.getElementById('tiempoDias').value;
	var valorTotalPresup = valorDia * tiempoDias * cantidadPersonas;
  var valorTotalContra = valorDia * tiempoDias;
	document.getElementById('valorTotalPresup').value = valorTotalPresup;
  document.getElementById('valorTotalContra').value = valorTotalContra;
	var presupuesto = document.getElementById('presupuesto').value;
  console.log(honorarios * tiempoDias * cantidadPersonas);
  if(valorTotalPresup > presupuesto){
    alert("Supera el tope del presupuesto asignado para este componente", 'danger')
  }

};
var alertPlaceholder = document.getElementById('mensaje');
function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class=" alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}
              </script>
              <div class="row pt-2 pb-2">
              
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor día</label>
                  <input class="form-control text-secondary" type="" id="valorDia" name="valorDia" placeholder="Valor día $" readonly>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor total del presupuesto</label>
                  <input class="form-control text-secondary" type="" id="valorTotalPresup" name="valorTotalPresup"  placeholder="Valor total del presupuesto $" readonly>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Valor total por contratista</label>
                  <input class="form-control text-secondary" type="" id="valorTotalContra" name="valorTotalContra"  placeholder="Valor total por contratista $" readonly >
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Apertura</label>
                  <input class="form-control text-secondary" type="date" name="fechaApertura" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de cierre</label>
                  <input class="form-control" type="date" name="fechaCierre" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                 <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Hora de cierre</label>
                  <input class="form-control" type="time" name="horaCierre" required>
                </div>
                <div class="col-xl-3 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Publicación</label>
                  <input class="form-control" type="date" name="fechaPublicacion" required>
                </div>
              </div>
               <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Medio de publicación</label>
                  <input class="form-control text-secondary" type="" name="medioPublicacion" placeholder="Medio de publicación" required>
                </div>
              </div>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-12">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Observaciones</label>
                    <textarea class="form-control"  name="adiciones" rows="3" required></textarea> 
                </div>
              </div>         
                <div class="row pt-2 text-center">
                  <div class="col-6">
                      <button class="btn btn-tdea" id="guardarDep">Guardar</button>
                  </div>
                </div>         
            </div>
          </div>
          <div class="row pt-3 pb-3">
                <div class="col-xl-4 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label text-dark">Buscar</label>
                  <input class="form-control text-secondary" type="" id="busqueda" name="busqueda" placeholder="Ingrese el componente a buscar" >
                </div>
              </div>
          <div id="tabla_resultado">

          </div>
          
                
            </form>
              </div>
      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../../public/js/validaciones.js"></script>
<script src="../../public/js/validaciones2.js"></script>
<?php  
  include_once "footer.php"
?>

