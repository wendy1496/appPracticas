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
        Lista de contratos
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <script src="../../public/js/main.js"></script>

        <form action="solicitudes.php" method="post">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
              <th>N° Contrato</th>
                <th>Periodo</th>
                <th>Nombre contratista</th>
                <th>Revisar</th>
              </tr>
          </thead>
          <tbody>
            <?php
        if($con){      
          $sql="SELECT b.contratista, b.cedulaContratista, c.numContrato, c.periodo FROM tblcontratista b INNER JOIN tblproyeccion c ON c.usuario = b.cedulaContratista where c.numContrato != 'NULL'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
          ?>
              <tr>
                <td><?php echo $fila['numContrato'] ?></td>
                <td><?php echo $fila['periodo'] ?></td>
                <td><?php echo $fila['contratista'] ?></td>
                <td><button class="btn btn-success" name="usuario" value="<?php echo $fila['cedulaContratista'] ?>" type="submit" ><i class="fas fa-search"></i></button></td>
              </tr>
              <?php
              }  
          }
        ?>
          </tbody>
          <tfoot>
              <tr>
              <th>N° Contrato</th>
                <th>Periodo</th>
                <th>Nombre contratista</th>
                <th>Revisar</th>
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

