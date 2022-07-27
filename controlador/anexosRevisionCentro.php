<div class="row pt-4">
<label for="formGroupExampleInput" class="form-label required text-dark text-center mt-2 mb-4" style="font-size: 15px;"><b><?php echo $titulo ?></b></label>
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
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$nit.'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
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
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$usuario.'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
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
             <!-- ESTADO debe corregir -->
    <?php
    if ($variable=='Debe corregir') {
  ?>         
            <div class="col-xl-2 col-sm-4 alert-danger text-center" role="alert">
            Debe corregirlo
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
                  <iframe src="<?php ECHO '../../controlador/anexos/'.$texto.$usuario.'.pdf' ?>" style="width:100%; height:600px;" frameborder="0"></iframe>
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

    <div class="col-xl-3 col-sm-6">
  <select class="form-select" id="exampleFormControlSelect1" name="<?php echo $nombre ?>">
                  <option value="<?php echo $variable ?>"><?php echo $variable ?></option>
                  <option  value="Aprobado">Aprobado</option>
                  <option  value="Aprobado sin anexo">Aprobado sin anexo</option>
                  <option  value="Debe corregir">Debe corregir</option>
                  <option  value="No necesario">No necesario</option>
                  <option  value="En proceso">En proceso</option>
                  </select>
  </div>
  <div class="row pt-2 pb-2">
    <?php 
    $sql5="SELECT * FROM tblObservaciones WHERE nombre = '$nombre' and nit ='$nit'";  
        $consulta5=$con->prepare($sql5);
        $consulta5->execute();  
        if ($fila5=$consulta5->fetch(PDO::FETCH_ASSOC)){
        ?> 
          <div class="col-xl-7 col-sm-12">
            <label for="formGroupExampleInput" class="form-label required text-dark">Observaciones</label>
              <textarea class="form-control" name="observacion<?php echo $nombre ?>" value="<?php echo $fila5['observacion'] ?>"><?php echo $fila5['observacion'] ?></textarea> 
          </div>

  <?php } else { ?>
      <div class="col-xl-7 col-sm-12">
        <label for="formGroupExampleInput" class="form-label required text-dark">Observaciones</label>
          <textarea class="form-control" name="observacion<?php echo $nombre ?>" value="<?php echo $fila5['observacion'] ?>"></textarea> 
      </div>
   
    <?php    }
    ?>
  </div>

</div>
