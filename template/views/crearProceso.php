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
       Datos generales proceso de prácticas
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
              $cedula = $_GET['cedula'];
              if($con){      
              $sql="SELECT * FROM tblestudiante WHERE cedulaEstudiante= '".$cedula."'" ;  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
        ?>
        <h5 class="text-center pt-4 pb-2">DATOS DEL PRACTICANTE</h5>
         <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombre practicante</label>
              <input class="form-control text-secondary" type="" name="nombre" value="<?php echo $fila['nombre'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cedula</label>
              <input class="form-control text-secondary" type="" name="nit" value="<?php echo $fila['cedulaEstudiante'] ?>" readonly>
            </div>
          </div>
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono celular/fijo personal</label>
              <input class="form-control text-secondary" type="email" name="correo" value="<?php echo $fila['telefono'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Facultad y programa</label>
              <input class="form-control text-secondary" type="" name="convenio" value="<?php echo $fila['facultad'] ?> - <?php echo $fila['nomPrograma'] ?>" required>
            </div>
            
          </div>
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Correo Electrónico en la empresa</label>
              <input class="form-control text-secondary" type="email" name="correoEmpresa"  required> 
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono en la empresa</label>
              <input class="form-control text-secondary" type="" name="telefonoEmpresa" required>
            </div>
            
          </div>
          <?php
            }  
        }
      ?> 
        <h5 class="text-center pt-4 pb-2">DATOS DEL ASESOR</h5>
      <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombres y apellidos</label>
              <input class="form-control text-secondary" type="" name="nombreAsesor" value="" required>
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Telefono celular/fijo</label>
              <input class="form-control text-secondary" type="number" name="telefonoAsesor" value="" required>
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Correo electrónico</label>
              <input class="form-control text-secondary" type="email" name="correoAsesor" value="" required>
            </div>
          </div>
          <?php
              $cedula = $_GET['cedula'];
              if($con){      
              $sql="SELECT * FROM tblestudiante WHERE cedulaEstudiante= '".$cedula."'" ;  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
                $facultad = $fila['facultad'];
                $sql="SELECT * FROM tblcentroPracticas WHERE facultad = '".$facultad."'";  
            $consulta=$con->prepare($sql);
            $consulta->execute();  
            while ($fila2=$consulta->fetch(PDO::FETCH_ASSOC)){
                                       
        ?>
          
          <h5 class="text-center pt-4 pb-2">DATOS DE LA EMPRESA</h5>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombre de la empresa o razón social</label>
              <input class="form-control text-secondary" type="" name="nombreEmpresa" value="<?php echo $fila2['nombre'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">NIT</label>
              <input class="form-control text-secondary" type="" name="nit" value="<?php echo $fila2['nit'] ?>" readonly>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Correo</label>
              <input class="form-control text-secondary" type="email" name="correo" value="<?php echo $fila2['correo'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Página Web</label>
              <input class="form-control text-secondary" type="" name="nombreContacto" value="<?php echo $fila2['paginaWeb'] ?>" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono</label>
              <input class="form-control text-secondary" type="" name="telefono" value="<?php echo $fila2['telefono'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Dirección</label>
              <input class="form-control text-secondary" type="" name="direccion" value="<?php echo $fila2['direccion'] ?>" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Ciudad</label>
            <input class="form-control text-secondary" type="" name="actividad" value="<?php echo $fila2['ciudad'] ?>" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Modalidad (presencial, virtual, alternancia)</label>
              <input class="form-control text-secondary" type="number" name="modalidad" placeholder="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de inicio</label>
            <input class="form-control text-secondary" type="date" name="fechaInicio" value="" required>
              </div>
              <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Fecha Final</label>
            <input class="form-control text-secondary" type="date" name="fechaFinal" value="" required>
              </div>
          </div>
          <?php
          }
            }  
        }
      ?>    

<h5 class="text-center pt-4 pb-2">DATOS DEL COOPERADOR O JEFE INMEDIATO</h5>
<div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Nombres y apellidos</label>
            <input class="form-control text-secondary" type="" name="nombreJefe" value="" required>
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Cargo</label>
              <input class="form-control text-secondary" type="number" name="cargoJefe" placeholder="" required>
            </div>
            <div class="col-xl-4 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Profesion</label>
            <input class="form-control text-secondary" type="" name="profesionJefe" value="" required>
              </div>
          </div>
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono celular/fijo</label>
            <input class="form-control text-secondary" type="" name="telefonoJefe" value="" required>
              </div>
              <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Correo Electrónico</label>
            <input class="form-control text-secondary" type="email" name="correoJefe" value="" required>
              </div>
          </div>
          <h5 class="text-center pt-4 pb-2">DESCRIPCION DEL PROYECTO O PRÁCTICA (en caso que aplique)</h5>
          <div class="row pt-2 pb-2">
                  <div class="col-xl-12 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Descripción</label>
                    <textarea class="form-control" id="objeto"  name="descripcion" rows="4"></textarea> 
                  </div>
          </div>
          <h5 class="text-center pt-4 pb-2">FUNCIONES A REALIZAR</h5>
          <div class="row pt-2 pb-2">
          <div class="col-xl-12 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Funciones</label>
                  <input class="form-control text-secondary" type="file" accept=".pdf" name="anexo" required>
                </div>
          </div>
          <h5 class="text-center pt-4 pb-2">PRODUCTO FINAL O ACTIVIDADES QUE DEBE ENTREGAR AL FINALIZAR LA PRACTICA (en caso que aplique)</h5>
          <div class="row pt-2 pb-2">
                  <div class="col-xl-12 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Producto final</label>
                    <textarea class="form-control" id="objeto"  name="funciones" rows="4"></textarea> 
                  </div>
          </div>
          <p>Para el desarrollo del proceso de las prácticas se debe tener en cuenta lo que establecen el Reglamento Estudiantil y el Reglamento General de Prácticas en especial, en lo que concierne a los deberes como estudiantes, deberes y obligaciones de los practicantes, de los centros de práctica, cooperadores y asesores de práctica.</p>
          <div class="row pt-2 text-center">
            <div class="col-6">
                <button class="btn btn-tdea">Crear</button>
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
  


