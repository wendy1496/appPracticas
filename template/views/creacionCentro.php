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
<div class="accordion container mb-4 mt-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Centro de prácticas
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="../../controlador/centroPracticas.php" method="post"  enctype="multipart/form-data" class="img-form">
 <div class="overlay">
      <div class="container">
      <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se guardaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
        <h5 class="text-center pt-3 pb-3">Centro de prácticas</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>

         <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombre de la empresa o razón social</label>
              <input class="form-control text-secondary" type="" name="nombreEmpresa" placeholder="Nombre Centro de prácticas" value="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">NIT</label>
              <input class="form-control text-secondary" type="" name="nit" placeholder="NIT Centro de prácticas" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Persona de contacto</label>
              <input class="form-control text-secondary" type="" name="nombreContacto" placeholder="Nombre de contacto" value="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Correo</label>
              <input class="form-control text-secondary" type="email" name="correo" placeholder="Correo contacto" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono</label>
              <input class="form-control text-secondary" type="" name="telefono" placeholder="Telefono Contacto" value="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Dirección</label>
              <input class="form-control text-secondary" type="" name="direccion" placeholder="Dirección Centro de prácticas" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Sexo</label> <br>
              <input class="form-check-input" type="radio" id="n" name="sexo" value="Si">
                    <label class="form-check-label" for="flexRadioDefault2">Femenino </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                    &nbsp &nbsp
                    <input class="form-check-input" type="radio" id="s" name="cProceso" value="No">
                    <label class="form-check-label" for="flexRadioDefault1">Masculino</label>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Representante legal o suplente</label>
              <input class="form-control text-secondary" type="" name="representante" placeholder="Indicar si es representante legal o suplente" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Ciudad</label>
              <input class="form-control text-secondary" type="" name="ciudad" placeholder="Ciudad" value="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label text-dark">Página Web</label>
              <input class="form-control text-secondary" type="" name="paginaWeb" placeholder="Página Web" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Descripción de la práctica</label>
            <input class="form-control text-secondary" type="" name="actividad" placeholder="Descripción Actividad Centro de prácticas" value="" required>

            </div>
            <div class="col-xl-6 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Facultad asociada</label>
                <select class="form-select" name="facultad"  aria-label="Default select example">
                <option selected> Seleccione...</option>
                  <option value="Administrativa">Ciencias administrativas y económicas</option>
                  <option value="Ingeniería">Ingeniería</option>
                  <option value="Derecho">Derecho y ciencias forenses</option>
                  <option value="Licenciatura">Licenciatura</option>
                  <option value="Trabajo Social">Trabajo Social</option>
                  <option value="Psicología">Psicología</option>
                </select>
              </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Capacidad de cupos</label>
              <input class="form-control text-secondary" type="number" name="capacidad" placeholder="Capacidad de cupos" value="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cupos asignados</label>
              <input class="form-control text-secondary" type="number" name="cuposAsignados" placeholder="Cupos Asignados" value="" required>
            </div>
          </div>
          <div class="row pt-2 text-center">
            <div class="col-6">
                <button class="btn btn-tdea">Crear</button>
            </div>
          </div> 
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>Nombre Centro de prácticas</th>
                  <th>NIT</th>
                  <th>Editar</th>
                  <th>Subir Documentos</th>
                </tr>
            </thead>
            <tbody>
              <?php
            
          if($con){      
            $sql="SELECT * FROM tblcentroPracticas";  
            $consulta=$con->prepare($sql);
            $consulta->execute();  
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
            ?>
                <tr>
                  <td><?php echo $fila['nombre'] ?></td>
                  <td><?php echo $fila['nit'] ?></td>
                  <td><a class="btn btn-primary" href="actualizarCentro.php?nit=<?php echo $fila['nit'] ?>"><i class="far fa-edit"></a></i></td>
                  <td><a class="btn btn-success" href="docCentroPracticas.php?nit=<?php echo $fila['nit'] ?>"><i class="fa fa-upload"></a></i></td>
                </tr>
                <?php
                }  
            }
          ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>Nombre Centro de prácticas</th>
                  <th>NIT</th>
                  <th>Editar</th>
                  <th>Subir Documentos</th>
                </tr>
            </tfoot>
        </table>
                
          </div>
          </div>
</form>
      </div>
    </div>
  </div>
</div>

<?php  
  include_once "footer.php"
?>
  

