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
        Lista de hojas de vida
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <script src="../../public/js/main.js"></script>

        <form action="" method="post">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Facultad</th>
                  <th>Programa</th>
                  <th>Nivel</th>
                  <th>Ver</th>
                </tr>
            </thead>
            <tbody>
              <?php
            
          if($con){      
            $sql="SELECT * FROM tblestudiante";  
            $consulta=$con->prepare($sql);
            $consulta->execute();  
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                          
            ?>
                <tr>
                  <td><?php echo $fila['cedulaEstudiante'] ?></td>
                  <td><?php echo $fila['nombre'] ?></td>
                  <td><?php echo $fila['facultad'] ?></i></td>
                  <td><?php echo $fila['nomPrograma'] ?></i></td>
                  <td><?php echo $fila['nivelPractica'] ?></i></td>
                  <td><a class="btn btn-success" href="hojaDeVida.php?cedula=<?php echo $fila['cedulaEstudiante'] ?>"><i class="fas fa-search"></a></i></td>
                </tr>
                <?php
                }  
            }
          ?>
            </tbody>
            <tfoot>
                <tr>
                <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Facultad</th>
                  <th>Programa</th>
                  <th>Nivel</th>
                  <th>Ver</th>
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

