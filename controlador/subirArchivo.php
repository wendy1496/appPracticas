<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $tipo       = $_FILES['anexo']['type'];
      $tamanio    = $_FILES['anexo']['size'];
      $archivotmp = $_FILES['anexo']['tmp_name'];
      $lineas     = file($archivotmp);
      
      $i = 0;
      
      foreach ($lineas as $linea) {
          $cantidad_registros = count($lineas);
          $cantidad_regist_agregados =  ($cantidad_registros - 1);
      
          if ($i != 0) {
      
              $datos = explode(";", $linea);
             
              $cedula = !empty($datos[0])  ? ($datos[0]) : '';
              $nombre= !empty($datos[1])  ? ($datos[1]) : '';
              $telefono     = !empty($datos[2])  ? ($datos[2]) : '';
              $correo = !empty($datos[3])  ? ($datos[3]) : '';
              $direccion = !empty($datos[4])  ? ($datos[4]) : '';
              $facultad = !empty($datos[5])  ? ($datos[5]) : '';
             
              $sql1="INSERT INTO `tblestudiante`(`cedulaEstudiante`, `nombre`, `telefono`, `correo`, `direccion`) 
              VALUES  ('$cedula', '$nombre', '$telefono', '$correo', '$direccion')";
              $consulta1=$con->prepare($sql1);
              $consulta1->execute();

              $sql7="INSERT INTO `tblanexoestudiante` (`estudiante`, `foto`, `firma`, `consentimiento`, `compromiso`) VALUES  ('$cedula','Sin enviar','Sin enviar', 'Sin enviar', 'Sin enviar')";
              $consulta7=$con->prepare($sql7);
              $consulta7->execute();

              $sql8="INSERT INTO `tblusuarios`(`cedula`, `nombre`, `rol`, `facultad`, `usuario`, `contrasena`) VALUES ('$cedula','$nombre','Estudiante','$facultad','$cedula','$cedula')";
              $consulta8=$con->prepare($sql8);
              $consulta8->execute();
          }
          $i++;
      }
      
      header('Location: ../template/views/index.php?mensaje=registrado3'); 
            }

?>
 
