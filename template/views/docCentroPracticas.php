<?php  
  include_once "header.php"
?>
<?php
  session_start();   
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
<div class="accordion container mb-4 mt-4" id="accordionExample">

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
        Subir documentos
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="../../controlador/anexos.php" method="post"  enctype="multipart/form-data" class="img-form">
          <div class="overlay">
               <div class="container">
        <h5 class="pt-2 pb-2 text-dark text-center">LISTA DE DOCUMENTOS A ADJUNTAR</h5>
        <?php 
        if($con){ 
          $nit = $_GET['nit'];     
          $sql="SELECT * FROM tblanexos WHERE nitEmpresa='$nit' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){ 

              $sql1="SELECT * FROM tbllistaanexos ORDER BY orden  ";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                      $nombre = $fila1['nombre'];
                      $titulo = $fila1['titulo'];
                      $texto = $fila1['texto'];
                      $variable = $fila[$nombre];
                      include "../../controlador/anexosHtml.php" ; 
                  }
                   
                   }  
          }
             ?>   
            <input  name="nit" type="hidden" value="<?php echo $nit ?>">
      
            <div class="row pt-2 text-center">
              <div class="col-6">
                  <button class="btn btn-tdea">Guardar</button>
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
  

