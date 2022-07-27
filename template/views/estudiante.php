<?php
include_once "header.php"
?>
<?php
include_once "header3.php"
?>
<?php
include_once '../../controlador/conexion.php';
$con = new Conexion();
$con = $con->conectar();
?>

<link rel="stylesheet" href="../../public/css/estilo.css">
<link rel="stylesheet" href="../../public/css/estilo2.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<div class="accordion container mb-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Hoja de vida
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form method="post" action="../../controlador/hojaDeVida.php" enctype="multipart/form-data" class="img-form">
          <div class="overlay">
            <div class="container">
              <?php
              if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
              ?>
                <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                  <p>Se guardaron los datos correctamente. Para iniciar sesión, su usuario y contraseña es el número de
                    cédula</p>
                </div>
              <?php
              }
              ?>
              <?php
              include_once '../../controlador/conexion.php';
              $con = new Conexion();
              $con = $con->conectar();
              $cedula = $_SESSION['username'];
              if ($con) {
                $sql = "SELECT * FROM tblanexoestudiante WHERE estudiante='$cedula' ";
                $consultax = $con->prepare($sql);
                $consultax->execute();
                if ($filax = $consultax->fetch(PDO::FETCH_ASSOC)) {
                  $sql1 = "SELECT * FROM tbllistaestudiante ORDER BY orden  ";
                  $consulta1 = $con->prepare($sql1);
                  $consulta1->execute();
                  while ($fila1 = $consulta1->fetch(PDO::FETCH_ASSOC)) {
                    $nombre = $fila1['nombre'];
                    $titulo = $fila1['titulo'];
                    $texto = $fila1['texto'];
                    $variable = $filax[$nombre];
                    if ($variable == 'Sin enviar' && $nombre == "foto") {
                      $nombre = "foto";
              ?>
                      <div class="form-file">
                        <div class="form-file__action">
                          <input type="file" accept=".jpg" name="<?php echo $nombre ?>" id="image" multiple style="display: none;" required>
                        </div>
                        <div class="form-file__result" id="result-image">
                          <img id="img-result" alt="" />
                        </div>
                      </div>
                    <?php
                    } else if ($variable == 'Enviado' && $nombre == "foto") {
                    ?>
                      <div class="form-file">

                        <div class="form-file__result" id="result-image">
                          <img id="img-result" src="<?php echo '../../controlador/anexos/foto_' . $cedula . '.jpg' ?>" alt="" />
                        </div>
                      </div>

                    <?php
                    }
                    ?>
                <?php
                  }
                }
                ?>


                <script src="../../public/js/app.js"></script>

                <?php
                $sql = "SELECT * FROM tblestudiante WHERE cedulaEstudiante='$cedula' ";
                $consulta = $con->prepare($sql);
                $consulta->execute();
                if ($fila3 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>


                  <div class="row pt-2 pb-2">
                    <div class="col-xl-6 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Nombres y Apellidos</label>
                      <input class="form-control text-secondary" type="" name="nombreEst" value="<?php echo $fila3['nombre'] ?>">
                    </div>
                    <div class="col-xl-6 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Documento de
                        identidad</label>
                      <input class="form-control text-secondary" type="" name="cedula" id="cedula" value="<?php echo $fila3['cedulaEstudiante'] ?>" readonly>
                    </div>
                  </div>

                  <div class="row pt-2 pb-2">
                    <div class="col-xl-5 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de nacimiento</label>
                      <input class="form-control text-secondary" type="date" id="nacimiento" name="nacimiento" value="<?php echo $fila3['fechaNacimiento'] ?>">
                    </div>

                    <div class="col-xl-2 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Edad</label>
                      <input class="form-control text-secondary" type="number" id="edad" name="edad" value="<?php echo $fila3['edad'] ?>">
                    </div>

                    <script>
                      const fechaNacimiento = document.getElementById('nacimiento');
                      const edad = document.getElementById('edad');

                      const calcularEdad = (fechaNacimiento) => {
                        const fechaActual = new Date();
                        const anoActual = parseInt(fechaActual.getFullYear());
                        const mesActual = parseInt(fechaActual.getMonth()) + 1;
                        const diaActual = parseInt(fechaActual.getDate());

                        // 2016-07-11
                        const anoNacimiento = parseInt(String(fechaNacimiento).substring(0, 4));
                        const mesNacimiento = parseInt(String(fechaNacimiento).substring(5, 7));
                        const diaNacimiento = parseInt(String(fechaNacimiento).substring(8, 10));

                        let edad = anoActual - anoNacimiento;
                        if (mesActual < mesNacimiento) {
                          edad--;
                        } else if (mesActual === mesNacimiento) {
                          if (diaActual < diaNacimiento) {
                            edad--;
                          }
                        }
                        return edad;
                      };

                      window.addEventListener('load', function() {

                        fechaNacimiento.addEventListener('change', function() {
                          if (this.value) {
                            console.log(calcularEdad(this.value));
                            edad.value = calcularEdad(this.value);
                          }
                        });

                      });
                    </script>
                    <div class="col-xl-5 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Telefono</label>
                      <input class="form-control text-secondary" type="" name="telefono" value="<?php echo $fila3['telefono'] ?>">
                    </div>
                  </div>

                  <div class="row pt-2 pb-2">
                    <div class="col-xl-6 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Correo</label>
                      <input class="form-control text-secondary" type="email" name="correoEst" value="<?php echo $fila3['correo'] ?>">
                    </div>
                    <div class="col-xl-6 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Dirección</label>
                      <input class="form-control text-secondary" type="" name="direccion" value="<?php echo $fila3['direccion'] ?>">
                    </div>
                  </div>

                  <h5 class="pt-4 pb-2">Información académica</h5>
                  <div class="row pt-2 pb-2">
                    <div class="col-xl-4 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Facultad</label>
                      <select class="form-select" name="facultad" aria-label="Default select example">
                        <option selected>
                          <?php echo $fila3['facultad'] ?>
                        </option>
                        <option value="Administrativa">Ciencias administrativas y económicas</option>
                        <option value="Ingeniería">Ingeniería</option>
                        <option value="Derecho">Derecho y ciencias forenses</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Trabajo Social">Trabajo Social</option>
                        <option value="Psicología">Psicología</option>
                      </select>
                    </div>
                  <div class="col-xl-4 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Nivel práctica</label>
                    <input class="form-control text-secondary" type="" name="nivelPrac" value="<?php echo $fila3['nivelPractica'] ?>">
                  </div>
                  <div class="col-xl-4 col-sm-6">
                    <label for="formGroupExampleInput" class="form-label required text-dark">Nombre del programa</label>
                    <input class="form-control text-secondary" type="" name="programa" value="<?php echo $fila3['nomPrograma'] ?>">
                  </div>
                  </div>
                  <div class="row pt-2 pb-2">
                    <div class="col-xl-6 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Electiva o línea de
                        enfasis</label>
                      <input class="form-control text-secondary" type="" name="electiva" value="<?php echo $fila3['electiva'] ?>">
                    </div>
                    <div class="col-xl-6 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Promedio Académico</label>
                      <input class="form-control text-secondary" type="" name="promedio" value="<?php echo $fila3['promedio'] ?>">
                    </div>
                  </div>
                <?php
                }
                ?>

                <h5 class="pt-4 pb-2">Estudios realizados</h5>
                <div class="row pt-2 pb-4">
                  <div class="col-12">
                    <span class="btn btn-primary" id="agregar1">Agregar <i class="fas fa-plus"></i></span>
                  </div>
                </div>
                <div class="clonar1">
                  <script>
                    window.onchange = function calculo2() {
                      let ced2 = document.getElementById('cedula');
                      let cedx = ced2.value;
                      let cedula1 = ced2.value;
                      let cedula3 = ced2.value;
                      let cedula4 = ced2.value;
                      let cedula5 = ced2.value;
                      console.log("cedx")
                      console.log(cedx);
                      document.getElementById('cedula1').value = cedula1;
                      document.getElementById('cedulax').value = cedx;
                      document.getElementById('cedula5').value = cedula5;
                      document.getElementById('cedula4').value = cedula4;
                      document.getElementById('cedula3').value = cedula3;


                    }
                  </script>
                  <div class="row pt-2 pb-2">
                    <div class="col-xl-4 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Titulo</label>
                      <input class="form-control text-secondary" name="titulo[]" id="titulo" placeholder="Titulo Obtenido">
                    </div>
                    <div class="col-xl-4 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Institución
                        educativa</label>
                      <input class="form-control" name="institucion[]" id="institucion" placeholder="Institución educativa">
                    </div>
                    <div class="col-xl-2 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Fecha de Grado</label>
                      <input class="form-control" type="date" name="fechaGrado[]" id="fechaGrado">
                      <input class="form-control" type="hidden" name="cedula1[]" id="cedula1">
                    </div>
                    <div class="col-xl-2 pt-4 text-center">
                      <button class="btn btn-danger puntero1 ocultar1" id="borrar1"><i class="fas fa-trash"></i></button>
                    </div>
                  </div>
                </div>
                <div id="contenedor1"></div>
                <script>
                  //Segundo contenido
                  let agregar1 = document.getElementById('agregar1');
                  let contenido1 = document.getElementById('contenedor1');
                  let borrar1 = document.getElementById('borrar1');

                  agregar1.addEventListener('click', e => {
                    e.preventDefault();
                    let clonado1 = document.querySelector('.clonar1');
                    let clon1 = clonado1.cloneNode(true);
                    contenido1.appendChild(clon1).classList.remove('clonar1');
                  });

                  borrar1.addEventListener('click', e => {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                  });

                  contenido1.addEventListener('click', e => {
                    e.preventDefault();
                    if (e.target.classList.contains('puntero1')) {
                      let contenedor1 = e.target.parentNode.parentNode;

                      contenedor1.parentNode.removeChild(contenedor1);
                    }
                  });
                </script>
                <br>
                <table class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Título</th>
                      <th>Institución</th>
                      <th>Fecha Grado</th>
                      <th>Eliminar título</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tbltitulos WHERE cedulaEstudiante='$cedula'";
                    $consulta = $con->prepare($sql);
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $fila['titulo'] ?>
                        </td>
                        <td>
                          <?php echo $fila['institucion'] ?>
                        </td>
                        <td>
                          <?php echo $fila['fechaGrado'] ?>
                        </td>
                        <td><a class="btn btn-danger" href="../../controlador/eliminarTitulos.php?titulos_id=<?php echo $fila['titulos_id'] ?>"><i class="fas fa-trash"></a></i></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>

                <h5 class="pt-4 pb-2">Formación complementaria</h5>
                <div class="row pt-2">
                  <div class="col-12">
                    <button class="btn btn-primary" id="agregar2">Agregar <i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="clonar2">
                  <div class="row pt-2 pb-2">

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Nombre</label>
                      <input class="form-control text-secondary" name="curso[]" placeholder="Nombre del curso realizado">
                    </div>

                    <div class="col-xl-4 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Institución</label>
                      <input class="form-control" name="institucionForm[]" placeholder="Institución donde realizó la formación">
                    </div>

                    <div class="col-xl-2 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label text-dark">Intensidad</label>
                      <input class="form-control text-secondary" type="number" name="intensidad[]" placeholder="Horas">
                    </div>

                    <div class="col-xl-2 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Fecha realización</label>
                      <input class="form-control" type="date" name="fechaForm[]" placeholder="">
                      <input class="form-control" type="hidden" name="cedula2[]" id="cedulax" placeholder="">
                    </div>

                    <div class="col-xl-1 pt-4 text-center">
                      <button class="btn btn-danger puntero2 ocultar2" id="borrar"><i class="fas fa-trash"></i></button>
                    </div>

                  </div>
                  <div id="ced"></div>
                </div>

                <div id="contenedor2"></div>
                <script>
                  //Segundo contenido
                  let agregar2 = document.getElementById('agregar2');
                  let contenido2 = document.getElementById('contenedor2');
                  let borrar = document.getElementById('borrar');

                  agregar2.addEventListener('click', e => {
                    e.preventDefault();
                    let clonado2 = document.querySelector('.clonar2');
                    let clon2 = clonado2.cloneNode(true);
                    contenido2.appendChild(clon2).classList.remove('clonar2');
                  });

                  borrar.addEventListener('click', e => {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                  });

                  contenido2.addEventListener('click', e => {
                    e.preventDefault();
                    if (e.target.classList.contains('puntero2')) {
                      let contenedor2 = e.target.parentNode.parentNode;

                      contenedor2.parentNode.removeChild(contenedor2);
                    }
                  });
                </script>
                <br>
                <table class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Institución</th>
                      <th>Intensidad</th>
                      <th>Fecha</th>
                      <th>Eliminar formación</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tblcomplementaria WHERE cedulaEstudiante='$cedula'";
                    $consulta = $con->prepare($sql);
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $fila['nombreC'] ?>
                        </td>
                        <td>
                          <?php echo $fila['institucionC'] ?>
                        </td>
                        <td>
                          <?php echo $fila['intensidad'] ?>
                        </td>
                        <td>
                          <?php echo $fila['fechaC'] ?>
                        </td>
                        <td><a class="btn btn-danger" href="../../controlador/eliminarComplementaria.php?complementaria=<?php echo $fila['complementaria_id'] ?>"><i class="fas fa-trash"></a></i></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>

                <h5 class="pt-4 pb-2">Idiomas</h5>
                <div class="row pt-2">
                  <div class="col-12">
                    <button class="btn btn-primary" id="agregar3">Agregar <i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="clonar3">
                  <div class="row pt-2 pb-2">

                    <div class="col-xl-5 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Idioma</label>
                      <input class="form-control text-secondary" name="idioma[]" placeholder="Titulo Obtenido">
                    </div>

                    <div class="col-xl-5 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Nivel</label>
                      <input class="form-control" name="nivel[]" placeholder="Nivel del idioma">
                      <input class="form-control" type="hidden" name="cedula3[]" id="cedula3" placeholder="Institución educativa">
                    </div>

                    <div class="col-xl-2 pt-4 text-center">
                      <button class="btn btn-danger puntero3 ocultar3" id="borrar3"><i class="fas fa-trash"></i></button>
                    </div>
                  </div>
                </div>

                <div id="contenedor3"></div>
                <script>
                  //Tercer contenido
                  let agregar3 = document.getElementById('agregar3');
                  let contenido3 = document.getElementById('contenedor3');

                  agregar3.addEventListener('click', e => {
                    e.preventDefault();
                    let clonado3 = document.querySelector('.clonar3');
                    let clon3 = clonado3.cloneNode(true);
                    contenido3.appendChild(clon3).classList.remove('clonar3');
                  });
                  borrar3.addEventListener('click', e => {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                  });

                  contenido3.addEventListener('click', e => {
                    e.preventDefault();
                    if (e.target.classList.contains('puntero3')) {
                      let contenedor3 = e.target.parentNode.parentNode;

                      contenedor3.parentNode.removeChild(contenedor3);
                    }
                  });
                </script>
                <br>
                <table class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Idioma</th>
                      <th>Nivel</th>
                      <th>Eliminar idioma</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tblidiomas WHERE cedulaEstudiante='$cedula'";
                    $consulta = $con->prepare($sql);
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $fila['idioma'] ?>
                        </td>
                        <td>
                          <?php echo $fila['nivel'] ?>
                        </td>
                        <td><a class="btn btn-danger" href="../../controlador/eliminarIdioma.php?idioma=<?php echo $fila['idioma_id'] ?>"><i class="fas fa-trash"></a></i></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <?php
                $sql = "SELECT * FROM tblestudiante WHERE cedulaEstudiante='$cedula' ";
                $consulta = $con->prepare($sql);
                $consulta->execute();
                if ($fila3 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>

                  <h5 class="pt-4 pb-2">Perfil profesional</h5>
                  <div class="row pt-2 pb-2">
                    <div class="col-xl-12 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Perfil Profesional</label>
                      <textarea class="form-control" id="objeto" name="perfilProf" rows="3"><?php echo $fila3['perfilProf'] ?></textarea>
                    </div>
                  </div>
                  <h5 class="pt-4 pb-2">Perfil practicante</h5>
                  <div class="row pt-2 pb-2">
                    <div class="col-xl-12 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Perfil Practicante</label>
                      <textarea class="form-control" id="objeto" name="perfilPrac" rows="3"><?php echo $fila3['perfilPract'] ?></textarea>
                    </div>
                  </div>
                <?php
                }
                ?>
                <h5 class="pt-4 pb-2">Experiencia laboral</h5>
                <div class="row pt-2">
                  <div class="col-12">
                    <button class="btn btn-primary" id="agregar4">Agregar <i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="clonar4">
                  <div class="row pt-2 pb-2">

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Institución</label>
                      <input class="form-control text-secondary" name="institucionLab[]" placeholder="Institución">
                    </div>

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Cargo</label>
                      <input class="form-control" name="cargoLab[]" placeholder="Cargo">
                    </div>

                    <div class="col-xl-2 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Tiempo</label>
                      <input class="form-control text-secondary" type="number" name="tiempoLab[]" placeholder="Tiempo">
                    </div>

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono</label>
                      <input class="form-control" type="" name="telLab[]" placeholder="Teléfono">
                      <input class="form-control" type="hidden" name="cedula4[]" id="cedula4" placeholder="">
                    </div>

                    <div class="col-xl-1 pt-4 text-center">
                      <button class="btn btn-danger puntero4 ocultar4" id="borrar4"><i class="fas fa-trash"></i></button>
                    </div>
                  </div>
                </div>
                <div id="contenedor4"></div>
                <script>
                  //Cuarto Contenido
                  let agregar4 = document.getElementById('agregar4');
                  let contenido4 = document.getElementById('contenedor4');

                  agregar4.addEventListener('click', e => {
                    e.preventDefault();
                    let clonado4 = document.querySelector('.clonar4');
                    let clon4 = clonado4.cloneNode(true);

                    contenido4.appendChild(clon4).classList.remove('clonar4');

                    let remover_ocutar4 = contenido4.lastChild.childNodes[1].querySelectorAll('span');

                  });

                  borrar4.addEventListener('click', e => {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                  });
                  contenido4.addEventListener('click', e => {
                    e.preventDefault();
                    if (e.target.classList.contains('puntero4')) {
                      let contenedor4 = e.target.parentNode.parentNode;

                      contenedor4.parentNode.removeChild(contenedor4);
                    }
                  });
                </script>
                <br>
                <table class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Institución</th>
                      <th>Cargo Laboral</th>
                      <th>Tiempo</th>
                      <th>Teléfono</th>
                      <th>Eliminar experiencia</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tblexplaboral WHERE cedulaEstudiante='$cedula'";
                    $consulta = $con->prepare($sql);
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $fila['institucionLab'] ?>
                        </td>
                        <td>
                          <?php echo $fila['cargoLab'] ?>
                        </td>
                        <td>
                          <?php echo $fila['tiempoLab'] ?>
                        </td>
                        <td>
                          <?php echo $fila['telLab'] ?>
                        </td>
                        <td><a class="btn btn-danger" href="../../controlador/eliminarLaboral.php?expLaboral=<?php echo $fila['expLab_id'] ?>"><i class="fas fa-trash"></a></i></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>

                <h5 class="pt-4 pb-2">Referencias personales</h5>
                <div class="row pt-2">
                  <div class="col-12">
                    <button class="btn btn-primary" id="agregar5">Agregar <i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="clonar5">
                  <div class="row pt-2 pb-2">

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Nombre Completo</label>
                      <input class="form-control text-secondary" name="refPersonal[]" placeholder="Nombre">
                    </div>

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Cargo</label>
                      <input class="form-control" name="cargoRef[]" placeholder="Cargo">
                    </div>

                    <div class="col-xl-2 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Teléfono</label>
                      <input class="form-control text-secondary" name="telRef[]" placeholder="Teléfono">
                    </div>

                    <div class="col-xl-3 col-sm-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">Celular</label>
                      <input class="form-control" type="" name="celRef[]" placeholder="Celular">
                      <input class="form-control" type="hidden" name="cedula5[]" id="cedula5" placeholder="Celular">
                    </div>

                    <div class="col-xl-1 pt-4 text-center">
                      <span class="btn btn-danger puntero5 ocultar5" id="borrar5"><i class="fas fa-trash"></i></span>
                    </div>
                  </div>


                </div>

                <div id="contenedor5"></div>
                <script>
                  //Quinto Contenido
                  let agregar5 = document.getElementById('agregar5');
                  let contenido5 = document.getElementById('contenedor5');

                  agregar5.addEventListener('click', e => {
                    e.preventDefault();
                    let clonado5 = document.querySelector('.clonar5');
                    let clon5 = clonado5.cloneNode(true);

                    contenido5.appendChild(clon5).classList.remove('clonar5');

                    let remover_ocutar5 = contenido5.lastChild.childNodes[1].querySelectorAll('span');

                  });
                  borrar5.addEventListener('click', e => {
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                  });
                  contenido5.addEventListener('click', e => {
                    e.preventDefault();
                    if (e.target.classList.contains('puntero5')) {
                      let contenedor5 = e.target.parentNode.parentNode;

                      contenedor5.parentNode.removeChild(contenedor5);
                    }
                  });
                </script>
                <br>
                <table class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Referencia</th>
                      <th>Cargo</th>
                      <th>Teléfono</th>
                      <th>Celular</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM tblrefpersonales WHERE cedulaEstudiante='$cedula'";
                    $consulta = $con->prepare($sql);
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $fila['refPersonal'] ?>
                        </td>
                        <td>
                          <?php echo $fila['cargoRef'] ?>
                        </td>
                        <td>
                          <?php echo $fila['telRef'] ?>
                        </td>
                        <td>
                          <?php echo $fila['celRef'] ?>
                        </td>
                        <td><a class="btn btn-danger" href="../../controlador/eliminarPersonal.php?personal=<?php echo $fila['refPersonales_id'] ?>"><i class="fas fa-trash"></a></i></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <div class="row mt-2  pt-4 text-center">
                  <?php
                  $sql = "SELECT * FROM tblestudiante WHERE cedulaEstudiante='$cedula' ";
                  $consulta = $con->prepare($sql);
                  $consulta->execute();
                  if ($fila3 = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $respuesta = $fila3['contratoAprendizaje'];
                    $respuesta2 = $fila3['requerimientos'];
                    if ($respuesta == "Si") {


                  ?>
                      <div class="col-6">
                        <label for="formGroupExampleInput" class="form-label required text-dark">¿He firmado contrato de
                          aprendizaje?</label><br>
                        <input class="form-check-input" type="radio" id="si" name="CARL" value="<?php echo $fila3['contratoAprendizaje'] ?>" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                        &nbsp &nbsp
                        <input class="form-check-input" type="radio" id="no" name="CARL" value="No">
                        <label class="form-check-label" for="flexRadioDefault1"> No</label>
                      </div>
                      <div class="col-xl-6 col-sm-6">

                        <label for="formGroupExampleInput" class="form-label text-dark">¿Con qué entidad?</label>
                        <input class="form-control text-secondary" id="arl" type="" name="arl" value="<?php echo $fila3['entidad'] ?>">
                      </div>
                    <?php
                    } else if ($respuesta == "No") {

                    ?>
                      <div class="col-6">
                        <label for="formGroupExampleInput" class="form-label required text-dark">¿He firmado contrato de
                          aprendizaje?</label><br>
                        <input class="form-check-input" type="radio" id="si" name="CARL" value="Si">
                        <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                        &nbsp &nbsp
                        <input class="form-check-input" type="radio" id="no" name="CARL" value="<?php echo $fila3['contratoAprendizaje'] ?>" checked>
                        <label class="form-check-label" for="flexRadioDefault1">No</label>
                      </div>
                      <div class="col-xl-6 col-sm-6">

                        <label for="formGroupExampleInput" class="form-label text-dark">¿Con qué entidad?</label>
                        <input class="form-control text-secondary" id="arl" type="" name="arl" disabled>
                      </div>
                    <?php
                    } else {

                    ?>
                      <div class="col-6">
                        <label for="formGroupExampleInput" class="form-label required text-dark">¿He firmado contrato de
                          aprendizaje?</label><br>
                        <input class="form-check-input" type="radio" id="si" name="CARL" value="Si">
                        <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                        &nbsp &nbsp
                        <input class="form-check-input" type="radio" id="no" name="CARL" value="No">
                        <label class="form-check-label" for="flexRadioDefault1"> No</label>
                      </div>
                      <div class="col-xl-6 col-sm-6">

                        <label for="formGroupExampleInput" class="form-label text-dark">¿Con qué entidad?</label>
                        <input class="form-control text-secondary" id="arl" type="" name="arl" disabled>
                      </div>

                    <?php
                    }
                    ?>



                    <div class="row pt-4 pb-2 text-center"">
                <?php
                    if ($respuesta2 == " Si") { ?>
                  <div class=" col-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">¿Presento requerimientos
                        adicionales para el desarrollo de mi práctica?</label><br>
                      <input class="form-check-input" type="radio" id="n" name="cProceso" value="<?php echo $fila3['requerimientos'] ?>" checked>
                      <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                      &nbsp &nbsp
                      <input class="form-check-input" type="radio" id="s" name="cProceso" value="No">
                      <label class="form-check-label" for="flexRadioDefault1"> No</label>
                    </div>
                    <div class="col-xl-6 col-sm-6">

                      <label for="formGroupExampleInput" class="form-label text-dark">¿Cuál?</label>
                      <input class="form-control text-secondary" id="porque" type="" value="<?php echo $fila3['cual'] ?>" name="respuesta">
                    </div>

                  <?php
                    } else if ($respuesta2 == "No") {
                  ?>
                    <div class=" col-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">¿Presento requerimientos
                        adicionales para el desarrollo de mi práctica?</label><br>
                      <input class="form-check-input" type="radio" id="n" name="cProceso" value="Si">
                      <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                      &nbsp &nbsp
                      <input class="form-check-input" type="radio" id="s" name="cProceso" value="<?php echo $fila3['requerimientos'] ?>" checked>
                      <label class="form-check-label" for="flexRadioDefault1"> No</label>
                    </div>
                    <div class="col-xl-6 col-sm-6">

                      <label for="formGroupExampleInput" class="form-label text-dark">¿Cuál?</label>
                      <input class="form-control text-secondary" id="porque" type="" name="respuesta" disabled>
                    </div>

                  <?php
                    } else {

                  ?>
                    <div class=" col-6">
                      <label for="formGroupExampleInput" class="form-label required text-dark">¿Presento requerimientos
                        adicionales para el desarrollo de mi práctica?</label><br>
                      <input class="form-check-input" type="radio" id="n" name="cProceso" value="Si">
                      <label class="form-check-label" for="flexRadioDefault2">Si </label> &nbsp &nbsp &nbsp &nbsp &nbsp
                      &nbsp &nbsp
                      <input class="form-check-input" type="radio" id="s" name="cProceso" value="No">
                      <label class="form-check-label" for="flexRadioDefault1"> No</label>
                    </div>
                    <div class="col-xl-6 col-sm-6">

                      <label for="formGroupExampleInput" class="form-label text-dark">¿Cuál?</label>
                      <input class="form-control text-secondary" id="porque" type="" name="respuesta" disabled>
                    </div>
                </div>
              <?php
                    }
              ?>
              <script src="../../public/js/jquery.min.js"></script>
              <script>
                var arl = document.getElementById('arl');
                var fechaArl = document.getElementById('fechaArl');


                document.getElementById('si').addEventListener('click', function(e) {
                  arl.disabled = false;
                  fechaArl.disabled = false;
                });

                document.getElementById('no').addEventListener('click', function(e) {
                  arl.disabled = true;
                  fechaArl.disabled = true;
                });
              </script>
            </div>
            <script>
              var porque = document.getElementById('porque');
              var fechaArl = document.getElementById('fechaArl');
              var noarl = document.getElementById('noarl');

              document.getElementById('n').addEventListener('click', function(e) {
                porque.disabled = false;
              });

              document.getElementById('s').addEventListener('click', function(e) {
                porque.disabled = true;
              });
            </script>
            <div class="row pt-2 pb-2">
              <div class="col-xl-6 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Ciudad</label>
                <input class="form-control text-secondary" type="" id="ciudad" name="ciudad" value="<?php echo $fila3['ciudad'] ?>">
              </div>
              <div class="col-xl-6 col-sm-6">
                <label for="formGroupExampleInput" class="form-label required text-dark">Fecha</label>
                <input class="form-control text-secondary" type="date" name="fechaEst" value="<?php echo $fila3['fecha'] ?>">
              </div>
            </div>
        <?php
                  }
                }
        ?>
        <?php
        $sql = "SELECT * FROM tblanexoestudiante WHERE estudiante='$cedula' ";
        $consultax = $con->prepare($sql);
        $consultax->execute();
        if ($filax = $consultax->fetch(PDO::FETCH_ASSOC)) {
          $sql1 = "SELECT * FROM tbllistaestudiante ORDER BY orden  ";
          $consulta1 = $con->prepare($sql1);
          $consulta1->execute();
          while ($fila1 = $consulta1->fetch(PDO::FETCH_ASSOC)) {
            $nombre = $fila1['nombre'];
            $titulo = $fila1['titulo'];
            $texto = $fila1['texto'];
            $variable = $filax[$nombre];
            if ($variable == 'Sin enviar' && $nombre == "firma") {
              $nombre = "firma";
        ?>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Firma</label>
                  <input class="form-control text-secondary" type="file" accept=".png" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio" required>
                </div>
              </div>
            <?php
            } else if ($variable == 'Enviado' && $nombre == "firma") {
              $nombre = "firma"
            ?>
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Firma</label>
                  <div class="form-file2">
                    <div class="form-file__action2">
                      <input type="file" name="<?php echo $nombre ?>" id="image2" />
                    </div>
                    <div class="form-file__result2" id="result-image2">
                      <img id="img-result2" src="<?php echo '../../controlador/anexos/firma_' . $cedula . '.png' ?>" alt="" />
                    </div>
                  </div>
                  <hr style="background: black;">

                </div>
              </div>
              <script src="../../public/js/app2.js"></script>

        <?php
            }
          }
        }
        ?>
         <div class="row pt-2 text-center">
          <div class="col-3"></div>
          <div class="col-3">
            <input type="hidden" id="estado" name="estado" value="Activo" />
            <button class="btn btn-tdea" id="guardar" name="guardar">Guardar</button>
          </div>
          <div class="col-3">
            <input type="hidden" id="estado" name="estado" value="Activo" />
            <a class="btn btn-primary" href="../../controlador/descargarHoja.php?user=<?php echo $_SESSION['username'] ?>"><i class="far fa-file-word"> Generar Archivo</a></i>
          </div>
          <div class="col-3"></div>
        </div>

          </div>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


<?php
include_once "footer.php"
?>

