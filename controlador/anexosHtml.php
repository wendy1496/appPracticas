<div class="row pt-4">
  

  <div class="col-xl-8 col-sm-6">
<label for="formGroupExampleInput" class="form-label required text-dark"><?php echo $titulo ?></label>
    <input class="form-control text-secondary" type="file" accept=".pdf, .doc, .xls" name="<?php echo $nombre ?>" placeholder="Entidad del Convenio">
  </div>



  <!-- ESTADO SIN ENVIAR -->
  <?php
    if ($variable=='Sin enviar') {
  ?>         
    <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
      Sin enviar
    </div>
    <?php
      }
    ?>
  <!-- ESTADO ENVIADO -->
  <?php
    if ($variable=='Enviado') {
  ?>         
            <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
      Enviado
    </div>
            <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
            <?php
                }
            ?>
             <!-- ESTADO APROBADO -->
    <?php
    if ($variable=='Aprobado') {
  ?>         
            <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
      Aprobado
    </div>
            <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
            <?php
                }
           
                ?>
            
  <!-- ESTADO corregir -->
  <?php
    if ($variable=='Debe corregir') {
  ?>         
            <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
            Debe corregir el documento
    </div>
            <div class="col-xl-2 col-sm-4">
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#a<?php echo $nombre ?>">
              <i class="far fa-file-pdf"></i>
              </button>
              <div class="modal fade" id="a<?php echo $nombre ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Anexo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$_SESSION['username'].'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
                           
            </div>
            <div class="row pt-2 pb-2">

            <?php 
    $sql5="SELECT * FROM tblObservaciones WHERE nombre = '$nombre' and usuario ='$_SESSION[username]'";  
        $consulta5=$con->prepare($sql5);
        $consulta5->execute();  
        if ($fila5=$consulta5->fetch(PDO::FETCH_ASSOC)){
        ?> 
          <div class="col-xl-6 col-sm-12">
            <label for="formGroupExampleInput" class="form-label required text-dark">Observaciones</label>
              <textarea class="form-control" name="observacion<?php echo $nombre?>" ><?php echo $fila5['observacion'] ?></textarea> 
          </div>

  <?php } ?>
            </div>
            <?php
                }
           
                ?>
            <!-- ESTADO No requerido -->
            <?php
                if ($variable=='No necesario') {
            ?>         
            <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
           No es necesario
    </div>
            <?php
                }
            ?>

            <!-- ESTADO APROBADO SIN ANEXO -->
            <?php
                if ($variable=='Aprobado sin anexo') {
            ?>   
            <div class="col-xl-2 col-sm-4 alert-success text-center" role="alert">
           Aprobado, pero queda pendiente el anexo
    </div>      
            
            <?php
                }
            ?>


</div>
