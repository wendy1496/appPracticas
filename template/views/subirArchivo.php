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
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Subir información
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <h5 class="text-center">Subir archivo Plano</h5>
        <form action="../../controlador/subirArchivo.php"  method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        
        
        <div class="row pt-2 pb-2">
          <div class="col-xl-7 col-sm-6">
            <label for="formGroupExampleInput" class="form-label required text-dark">Archivo CSV contrato interadministrativo</label>
            <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="anexo" placeholder="Entidad del Convenio">            
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