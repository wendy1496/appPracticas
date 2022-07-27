<?php  
  include_once "header.php"
?>
<?php  
  include_once "header4.php"
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
        Lista de chequeo
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <script src="../../public/js/main.js"></script>
      <?php
            $usuario = $_SESSION['username'];
            if($con){      
              $sql="SELECT * FROM `tblusuarios` WHERE `usuario` = '$usuario' ";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              if ($fila3=$consulta->fetch(PDO::FETCH_ASSOC)){ 
                $facultad = $fila3['facultad'];                   
              ?>
        <form action="" method="post">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>Nombre Centro de prácticas</th>
                  <th>NIT</th>
                  <th>Facultad</th>
                  <th>Revisar Documentos</th>
                </tr>
            </thead>
            <tbody>
              <?php
            
          if($con){      
            $sql="SELECT a.nit, a.nombre, b.modalidad FROM tblcentropracticas a INNER JOIN tblcentrofacultad b ON a.nit = b.nit WHERE b.modalidad = '$facultad'";  
            $consulta=$con->prepare($sql);
            $consulta->execute();  
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
            ?>
                <tr>
                  <td><?php echo $fila['nombre'] ?></td>
                  <td><?php echo $fila['nit'] ?></td>
                  <td><?php echo $fila['modalidad'] ?></i></td>
                  <td><a class="btn btn-success" href="revisionCentro.php?nit=<?php echo $fila['nit'] ?>"><i class="fas fa-search"></a></i></td>
                </tr>
                <?php
                }  
            }
          ?>
          <?php
              }
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>Nombre Centro de prácticas</th>
                  <th>NIT</th>
                  <th>Facultad</th>
                  <th>Subir Documentos</th>
                </tr>
            </tfoot>
        </table>
        </form>

      </div>
    </div>
  </div>
</div>
<?php  
  include_once "footer.php"
?>

