<?php  
  include_once "header.php"
?>
<?php
  session_start();   
?>  
<nav class="navbar navbar-expand-lg navbar-light bg-light container mb-4">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
    <div>
      <a class="btn" href="listaRevision.php"><i class="fas fa-undo-alt"></i> VOLVER AL LISTADO REVISIÓN </a>
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
<div class="accordion container mb-4 mt-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Datos Personales
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="../../controlador/actualizarContratista.php" method="post"  enctype="multipart/form-data" class="img-form">
 <div class="overlay">
      <div class="container">

        <h5 class="text-center pt-3 pb-3">Solicitud</h5>
        <?php
include_once '../../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
  $usuario = $_REQUEST['usuario'];
  if($con){ 
      $sql="SELECT b.contratista, b.cedulaContratista, c.numContrato, c.periodo FROM tblcontratista b INNER JOIN tblproyeccion c ON c.usuario = b.cedulaContratista WHERE b.cedulaContratista='$usuario' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
         <div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Número del contrato</label>
              <input class="form-control text-secondary" type="" name="numContrato" placeholder="" value="<?php echo $fila['numContrato'] ?>" required>
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Periodo</label>
              <input class="form-control text-secondary" type=""  name="periodo" placeholder="" value="<?php echo $fila['periodo'] ?>" required>
            </div>

          </div>
          
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  function mostrar(id) {
    if (id == "adicion") {
        $("#adicion").show();
        $("#suspension").hide();
    }else if(id == "seleccione"){
      $("#adicion").hide();
      $("#suspension").hide();
    }else if(id == "suspension"){
      $("#suspension").show();
      $("#adicion").hide();

    }
  }
</script>
<div class="row pt-2 pb-2">
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombre Contratista</label>
              <input class="form-control text-secondary" type="" name="contratista" value="<?php echo $fila['contratista'] ?>">
            </div>
            <div class="col-xl-4 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Opción</label>
              <select id="numContrato"  name="numContrato" class="form-select" aria-label="Default select example" onChange="mostrar(this.value);">
                <option value="seleccione" selected>Seleccione...</option>
                <option value="adicion">Adición</option>
                <option value="otrosi">Otro Sí</option>
                <option value="suspension">Suspensión</option>
                <option value="terminacion">Terminación Anticipada</option>
                <option value="liquidacion">Liquidación del contrato</option>
              </select>
            </div>
          </div>  
          
        <div id="adicion" style="display: none;">
          <h5 class="text-center pt-3 pb-3">1. Solicitud de la adición</h5>
          <form action="../../controlador/actualizarContratista.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Adición N°</label>
              <input class="form-control text-secondary" type="hidden" name="numContrato" placeholder="" value="<?php echo $fila['numContrato'] ?>" required>
              <input class="form-control text-secondary" type="" name="adicion" placeholder="N° Adición" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-12">
              <label for="formGroupExampleInput" class="form-label required text-dark">Justificación</label>
                <textarea class="form-control"  name="justificación" rows="3" required></textarea> 
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Inicio</label>
              <input class="form-control text-secondary" type="date" id="fechaInicio" name="fechaInicio" placeholder="Fecha de Inicio" required>
            </div>
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Finalización</label>
              <input class="form-control" type="date" id="fechaFinal" name="fechaFinal" placeholder="Fecha de Finalización" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">N° Días</label>
              <input class="form-control text-secondary" type="" name="dias" placeholder="N° días" value="" required>
            </div>
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Plazo de la adición</label>
              <input class="form-control text-secondary" type="" name="plazo" placeholder="N° días" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Valor adición</label>
              <input class="form-control text-secondary" type="" name="valorAdicion" placeholder="Valor adición" value="" required>
            </div>
            <div class="col-xl-3 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Valor adición en letras</label>
              <input class="form-control text-secondary" type="" name="valorAdicionLetras" placeholder="Valor en letras adición" value="" required>
            </div>
          </div>
          <div class="row pt-2 pb-2 text-center">
            <div class="col-6">
                <button class="btn btn-tdea">Generar Solicitud</button>
            </div>
          </div>
        </form><h5 class="text-center pt-3 pb-3">2. Creación de la adición</h5>
        <form action="../../controlador/actualizarContratista.php" method="post"  enctype="multipart/form-data" class="img-form">
        
        <div class="row pt-2 pb-2">
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">N° CDP</label>
            <input class="form-control text-secondary" type="" name="cdp" placeholder="N° CDP" value="" required>
          </div>
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Valor en letras</label>
            <input class="form-control text-secondary" type="" name="valorLetrasCDP" placeholder="Valor en letras" value="" required>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Valor en números</label>
            <input class="form-control text-secondary" type="" name="valorCDP" placeholder="Valor adición" value="" required>
          </div>
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Ajuntar CDP</label>
            <input class="form-control text-secondary" type="file" name="anexo" required>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">N° RP</label>
            <input class="form-control text-secondary" type="" name="rp" placeholder="N° CDP" value="" required>
          </div>
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Valor en letras</label>
            <input class="form-control text-secondary" type="" name="valorLetrasRP" placeholder="Valor en letras" value="" required>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Valor en números</label>
            <input class="form-control text-secondary" type="" name="valorRP" placeholder="Valor adición" value="" required>
          </div>
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Adjuntar RP</label>
            <input class="form-control text-secondary" type="file" name="anexoRP" required>
          </div>
        </div>
        <div class="row pt-2 pb-2 text-center">
          <div class="col-6">
              <button class="btn btn-tdea">Guardar</button>
          </div>
        </div>
      </form>
      </div>

      <script>
        function mostrarOtro(id) {
          if (id == "otro") {
              $("#otro").show();
          }else if(id != "otro"){
            $("#otro").hide();
          }
        }
      </script>
      <script>
        function mostrarSolicitud(id) {
          if (id == "solicitudSusp") {
              $("#solicitudSusp").show();
          }else if(id == "actaSusp"){
            $("#actaSusp").show();
            $("#solicitudSusp").hide();
          }else if(id == "seleccione"){
            $("#actaSusp").hide();
            $("#solicitudSusp").hide();
          }
        }
      </script>

      <div id="suspension" style="display: none;">
        <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Solicitud a realizar</label>
            <select id="numContrato"  name="tipoSusp" class="form-select" aria-label="Default select example" onChange="mostrarSolicitud(this.value);">
              <option value="seleccione" selected>Seleccione...</option>
              <option value="solicitudSusp">Crear solicitud de suspensión</option>
              <option value="actaSusp">Creación acta de levantamiento de suspensión</option>
            </select>
          </div>
        </div>
      </div>

      <div id="solicitudSusp" style="display: none;">
        <h5 class="text-center pt-3 pb-3">Creación de la solicitud de suspensión</h5>
        <form action="../../controlador/actualizarContratista.php" method="post"  enctype="multipart/form-data" class="img-form">
        <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Suspensión N°</label>
            <input class="form-control text-secondary" type="hidden" name="numContrato" placeholder="" value="<?php echo $fila['numContrato'] ?>" required>
            <input class="form-control text-secondary" type="" name="adicion" placeholder="N° suspensión" value="" required>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Tipo de suspensión</label>
            <select id="numContrato"  name="tipoSusp" class="form-select" aria-label="Default select example" onChange="mostrarOtro(this.value);">
              <option value="seleccione" selected>Seleccione...</option>
              <option value="licencia">Licencia de maternidad</option>
              <option value="incapacidad">Incapacidad</option>
              <option value="suspension">Suspensión temporal del contrato interadministrativo</option>
              <option value="cumplimiento">Cumplimiento de productos</option>
              <option value="otro">Otros</option>
            </select>
          </div>
        </div>
        <div id="otro" style="display: none;">
          <div class="row pt-2 pb-2">
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">¿Cuál?</label>
              <input class="form-control text-secondary" type="" name="otro" placeholder="Mencione cuál otro tipo" value="" required>
            </div>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-12">
            <label for="formGroupExampleInput" class="form-label required text-dark">Motivo de la suspensión</label>
              <textarea class="form-control"  name="motivo" rows="3" required></textarea> 
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Inicio</label>
            <input class="form-control text-secondary" type="date" id="fechaInicioSusp" name="fechaInicio" placeholder="Fecha de Inicio" required>
          </div>
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Finalización</label>
            <input class="form-control" type="date" id="fechaFinal" name="fechaFinalSusp" placeholder="Fecha de Finalización" required>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">N° de días de la suspensión</label>
            <input class="form-control text-secondary" type="" name="diasSusp" placeholder="N° días" value="" required>
          </div>
          <div class="col-xl-3 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Plazo de la suspensión</label>
            <input class="form-control text-secondary" type="" name="plazoSusp" placeholder="N° días" value="" required>
          </div>
        </div>
        <div class="row pt-2 pb-2 text-center">
          <div class="col-3">
              <button class="btn btn-tdea">Generar Solicitud</button>
          </div>
          <div class="col-3">
            <button class="btn btn-tdea">Generar acta</button>
        </div>
        </div>
      </form>

      <h5 class="text-center pt-3 pb-3">Documentos a adjuntar</h5>
      <form>
        <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Ajuntar solicitud de suspensión</label>
            <input class="form-control text-secondary" type="file" name="anexoSolicitud" required>
          </div>
        </div>
        <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Ajuntar acta de suspensión</label>
            <input class="form-control text-secondary" type="file" name="anexoSuspensión" required>
          </div>
        </div>
        <div class="row pt-2 pb-2 text-center">
          <div class="col-6">
              <button class="btn btn-tdea">Enviar</button>
          </div>
        </div>
      </form>
    </div>
    <div id="actaSusp" style="display: none;">
      <h5 class="text-center pt-3 pb-3">Creación del acta de levantamiento de suspensión </h5>
      <form action="../../controlador/actualizarContratista.php" method="post"  enctype="multipart/form-data" class="img-form">
      <div class="row pt-2 pb-2">
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">Contratista: </label>
          <input class="form-control text-secondary" type="" name="contratista" value="<?php echo $fila['contratista'] ?>">
        </div>
        <div class="col-xl-3 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">Con número de contrato:</label>
          <input class="form-control text-secondary" type="" name="numContrato" placeholder="" value="<?php echo $fila['numContrato'] ?>" required>
        </div>
      </div>
      <div class="row pt-2 pb-2">
        <div class="col-xl-6 col-sm-12">
          <label for="formGroupExampleInput" class="form-label required text-dark">Motivo del levantamiento la suspensión</label>
            <textarea class="form-control"  name="motivo" rows="3" required></textarea> 
        </div>
      </div>
      <div class="row pt-2 pb-2">
        <div class="col-xl-6 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">Plazo del levantamiento de la suspensión</label>
          <input class="form-control text-secondary" type="date" id="fechaInicioSusp" name="fechaInicio" placeholder="Fecha de Inicio" required>
        </div>
      </div>      
      <div class="row pt-2 pb-2 text-center">
        <div class="col-6">
            <button class="btn btn-tdea">Generar Acta</button>
        </div>
      </div>
    </form>

    <h5 class="text-center pt-3 pb-3">Documentos a adjuntar</h5>
    <form>
      <div class="row pt-2 pb-2">
        <div class="col-xl-6 col-sm-6">
          <label for="formGroupExampleInput" class="form-label required text-dark">Ajuntar acta de levantamiento de suspensión</label>
          <input class="form-control text-secondary" type="file" name="anexoSolicitud" required>
        </div>
      </div>
      <div class="row pt-2 pb-2 text-center">
        <div class="col-6">
            <button class="btn btn-tdea">Enviar</button>
        </div>
      </div>
    </form>
   
  </div>

          </div>
          </div>
</form>
      </div>
    </div>
  </div>
  <?php
              }  
          }
        ?> 
</div>

<?php  
  include_once "footer.php"
?>
  