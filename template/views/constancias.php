<?php  
  include_once "header.php"
?>
<?php  
  include_once "header2.php"
?>
<div class="accordion container mb-4 mt-4" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Constancias de asesoría
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="../../controlador/rol.php" method="post"  enctype="multipart/form-data" class="img-form">
 <div class="overlay">
      <div class="container">
      <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'enviado'){
            ?>
              <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                <p>Se registraron los datos correctamente</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
            
            <h5 class="text-center pt-3 pb-3">CONSTANCIAS</h5>
              <center>
                <p>Subir archivo de constancia de cada asesoría de práctica</p>
              </center>

              <div class="row pt-2 text-center">
                <div class="col-4">
                </div>
                <div class="col-4">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Descargar Constancia de asesoría </label>
                </div>
                <div class="col-4"></div>
              </div>

              <div class="row pt-2 text-center">
                <div class="col-4">
                  
                </div>
                <div class="col-4">
                <a class="btn btn-primary" href="../../controlador/anexos/constancia.docx"
                    download="compromiso.docx"><i class="far fa-file-word"></i></a>
                </div>
                <div class="col-4">

                </div>
              </div>

         <div class="row pt-2 pb-2">
            <div class="col-xl-10 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nombre del asesor</label>
              <input class="form-control text-secondary" type="" name="asesor" placeholder="" required>
            </div>
            <div class="col-xl-2 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Número de asesoría</label>
              <input class="form-control text-secondary" type="number" name="asesor" placeholder="#" required>
            </div>
          </div>
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Facultad</label>
              <input class="form-control text-secondary" type="" name="facultad" placeholder="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Nivel práctica</label>
              <input class="form-control text-secondary" type="" name="nivel" placeholder="" required>
            </div>
          </div> 
          <div class="row pt-2 pb-2">
          <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Programa</label>
              <input class="form-control text-secondary" type="" name="Programa" placeholder="" required>
            </div>
            <div class="col-xl-6 col-sm-6">
              <label for="formGroupExampleInput" class="form-label required text-dark">Escenario de prácticas</label>
              <input class="form-control text-secondary" type="" name="escenario" placeholder="" required>
            </div>
          </div> 
          <div class="row pt-2 pb-2">
                <div class="col-xl-6 col-sm-6">
                  <label for="formGroupExampleInput" class="form-label required text-dark">Subir constancia</label>
                  <input class="form-control text-secondary" type="file" accept=".png" name="anexo"
                    placeholder="Entidad del Convenio" required>
                </div>
              </div>
          <div class="row pt-2 text-center">
            <div class="col-6">
                <button class="btn btn-tdea">Guardar</button>
            </div>
          </div> 
          </div>
          </div>
</form>
<table class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <th>N°</th>
                    <th>Facultad</th>
                    <th>Programa</th>
                    <th>Archivo</th>
                  </tr>
              </thead>
              <tbody>
               
              </tbody>
              
          </table>
      </div>
    </div>
  </div>
  
</div>

<?php  
  include_once "footer.php"
?>
  

