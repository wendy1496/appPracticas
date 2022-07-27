<?php  
  include_once "header.php"
  ?>
  <?php  
  include_once "header2.php"
?>
<div class="accordion container pb-2" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Crear Usuarios
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <h4 class="text-center">Creación de usuarios</h4>

<form action="../../controlador/registroUsuarios.php" method="post" id="frmComponentes" class="img-form">
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
                }else if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'actualizado'){
            ?> 
            <div class=" mb-2 mt-2 alert alert-warning alert-dismissible fade show" role="alert">
                <p><strong>¡El Usuario ya existía!</strong> Se actualizaron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
              }  
        ?>

              <div class="row pt-2 pb-2">
              <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Cédula</label>
                  <input class="form-control text-secondary" type="" name="cedula" placeholder="Cédula" required>
                </div>
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Nombre</label>
                  <input class="form-control text-secondary" type="" name="nombre" placeholder="Nombre Completo" required>
                </div>
              </div>
              <form id="f1" name="f1">
              <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Rol</label>
                <select class="form-select" aria-label="Default select example" id="rol" name="rol" onchange="cambiarDatos()">
                  <option value="0">Seleccione...</option>
                  <option value="Coordinador general de prácticas">Coordinador general de prácticas</option>
                  <option value="Coordinador de facultad">Coordinador de facultad</option>
                  <option value="Coordinador de programa">Coordinador de programa</option> 
                  <option value="Coordinador de emprendimiento">Coordinador de emprendimiento</option>             
                  <option value="Coordinador de docencia servicio">Coordinador de docencia servicio</option>             
                  <option value="Coordinación jurídica">Coordinación jurídica</option>           
                  <option value="Docente asesor">Docente asesor</option> 
                  <option value="Asesor escenario de prácticas">Asesor escenario de prácticas</option>           
                  <option value="Profesional jurídico de prácticas">Profesional jurídico de prácticas</option>           
                  <option value="Decano">Decano</option>
                  <option value="Secretaría general">Secretaría general</option>
                  <option value="Rectoría">Rectoría</option>           
                  <option value="Vicerrectoría">Vicerrectoría</option>           
                </select>
                </div>
                <div class="col-xl-6 col-sm-6">
                  
                <label for="formGroupExampleInput" class="form-label required text-dark">Facultad o programa</label>
                <select class="form-select" id=facultad name="facultad" aria-label="Default select example">
                
                </select>
               
              </div>
            </form>
              <script>
                let coordinador_facultad = ["Seleccione...", "Ingeniería", "Derecho", "Administración"];
                let coordinador_programa = ["Seleccione...", "Licenciatura en Literatura y Lengua Castellana", "Licenciatura en Educación Infantil", "Trabajo Social", "Psicología", "Enfermería"];
                let coordinador_decano = ["Seleccione...", "Ingeniería", "Derecho", "Administración", "Educación"];

                function cambiarDatos(){
                 let rol = document.getElementById('rol');
                 let facultad = document.getElementById('facultad');
                 console.log(rol.value);
                 if(rol.value == "Coordinador de facultad"){
                  let stringTabla = `
                  <option selected> Seleccione...</option>
                  <option value="Ingeniería">Ingeniería</option>
                  <option value="Derecho">Derecho</option>
                  <option value="Administración">Administración</option>
                  `;
                  facultad.innerHTML = stringTabla;
                 }else if(rol.value == "Coordinador de programa"){
                  let stringTabla = `
                  <option selected> Seleccione...</option>
                  <option value="Licenciatura en Literatura y Lengua Castellana">Licenciatura en Literatura y Lengua Castellana</option>
                  <option value="Licenciatura en Educación Infantil">Licenciatura en Educación Infantil</option>
                  <option value="Trabajo Social">Trabajo Social</option>
                  <option value="Psicología">Psicología</option>
                  `;
                  facultad.innerHTML = stringTabla;
                 }else if(rol.value == "Decano"){
                  let stringTabla = `
                  <option selected> Seleccione...</option>
                  <option value="Ingeniería">Ingeniería</option>
                  <option value="Derecho">Derecho</option>
                  <option value="Administración">Administración</option>
                  <option value="Educación">Educación</option>
                  `;
                  facultad.innerHTML = stringTabla;
                 }else{
                  let stringTabla = `
                  <option value="No aplica">No aplica</option>
                  `;
                  facultad.innerHTML = stringTabla;
                 }
                }

              </script>
          </div>  
                <div class="row pt-2 text-center">
                  <div class="col-6">
                      <button class="btn btn-tdea" id="guardarCont">Guardar</button>
                  </div>
                </div>             
            </div>
              </div>
              
        </form >
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Listar Usuarios
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
<h4 class="text-center">Listado de Usuarios creados</h4>
        <table id="example" class="table table-striped table-bordered container" style="width:100%">
          <thead>
              <tr>
                <th>Nombre </th>
                <th>Cédula</th>
                <th>Rol</th>
                <th>Facultad</th>
              </tr>
          </thead>
          <tbody>
            <?php
            include_once '../../controlador/conexion.php';
            $con=new Conexion();
            $con=$con->conectar(); 
        if($con){      
          $sql="SELECT * FROM tblUsuarios";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['nombre'] ?></td>
                <td><?php echo $fila['cedula'] ?></td>
                <td><?php echo $fila['rol'] ?></td>
                <td><?php echo $fila['facultad'] ?></td>          
          </tr>
          <?php
        }  
    }
  ?>
</tbody>
</table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
        Subir estudiante
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <h5 class="text-center">Subir archivo Plano</h5>
        <form action="../../controlador/subirArchivo.php"  method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
                <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado3'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se registraron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
        
        <div class="row pt-2 pb-2">
          <div class="col-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Descargar archivo CSV listado de estudiantes</label>
            <a class="btn btn-success" href="../../controlador/anexos/estudiante.csv" download="estudiante.csv"><i class="far fa-file-excel"></i></a>
          </div>
          <div class="col-xl-7 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Subir archivo CSV listado de estudiantes</label>
            <input class="form-control text-secondary" type="file" accept=".xls, .csv" name="anexo" placeholder="Entidad del Convenio">            
          </div>
        </div> 

            <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Subir</button>
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
