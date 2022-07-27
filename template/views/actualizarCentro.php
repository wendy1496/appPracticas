<?php  
  include_once "header.php"
?>
<?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();                            
          ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light container mb-4">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
    <div>
      <a class="btn" href="creacionCentro.php"><i class="fas fa-undo-alt"></i> VOLVER</a>
    </div>
  </div>
  <div>
    <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                ?>
      <a class="btn" href="../views/inicioSesion.php">Salir <i class="fas fa-sign-out-alt"></i></a>
      <?php                
              }
            ?>
    </div>
</nav>
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
      <form action="../../controlador/actualizarCentro.php" method="post"  enctype="multipart/form-data" class="img-form">
 <div class="overlay">
      <div class="container">
      <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se actualizaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
        <h5 class="text-center pt-3 pb-3">Centro de prácticas</h5>
        <center><p>Los campos marcados con * son obligatorios</p></center>
        <?php
              $nit = $_GET['nit'];
              if($con){      
              $sql="SELECT * FROM tblcentropracticas WHERE nit= '".$nit."'" ;  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
        ?>
         <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombre de la empresa</label>
              <input class="form-control text-secondary" type="" name="nombreEmpresa" value="<?php echo $fila['nombre'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">NIT</label>
              <input class="form-control text-secondary" type="" name="nit" value="<?php echo $fila['nit'] ?>" readonly>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Número Convenio</label>
              <input class="form-control text-secondary" type="" name="convenio" value="<?php echo $fila['convenio'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Fecha Convenio</label>
              <input class="form-control text-secondary" type="date" name="fechaConvenio" value="<?php echo $fila['fecha'] ?>" required> 
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Persona de contacto</label>
              <input class="form-control text-secondary" type="" name="nombreContacto" value="<?php echo $fila['contacto'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Correo</label>
              <input class="form-control text-secondary" type="email" name="correo" value="<?php echo $fila['correo'] ?>" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono</label>
              <input class="form-control text-secondary" type="" name="telefono" value="<?php echo $fila['telefono'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Dirección</label>
              <input class="form-control text-secondary" type="" name="direccion" value="<?php echo $fila['direccion'] ?>" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Descripción de la práctica</label>
            <input class="form-control text-secondary" type="" name="actividad" value="<?php echo $fila['actividad'] ?>" required>

            </div>
            <div class="col-xl-6 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Facultad asociada</label>
                <select class="form-select" name="facultad"  aria-label="Default select example">
                  <option value="<?php echo $fila['facultad'] ?>"><?php echo $fila['facultad'] ?></option>
                  <option value="Administrativa">Ciencias administrativas y económicas</option>
                  <option value="Ingeniería">Ingeniería</option>
                  <option value="Derecho">Derecho y ciencias forenses</option>
                  <option value="Licenciatura">Licenciatura</option>
                  <option value="TrabajoSocial">Trabajo Social</option>
                  <option value="Psicología">Psicología</option>
                </select>
              </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Capacidad de cupos</label>
              <input class="form-control text-secondary" type="number" name="capacidad" value="<?php echo $fila['capacidad'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cupos asignados</label>
              <input class="form-control text-secondary" type="number" name="cuposAsignados" value="<?php echo $fila['cupos'] ?>" required>
            </div>
          </div>
          <?php
            }  
        }
      ?>       
          <div class="row pt-2 text-center">
            <div class="col-6">
                <button class="btn btn-tdea">Actualizar</button>
            </div>
          </div> 
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
  


