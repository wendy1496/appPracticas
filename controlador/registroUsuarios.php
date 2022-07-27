<?php
include_once 'conexion.php';
session_start();
$cedula = $_REQUEST['cedula'];
$nombre = $_REQUEST['nombre'];
$facultad = $_REQUEST['facultad'];
$rol = $_REQUEST['rol'];

  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      
      $sql3="SELECT * FROM tblUsuarios WHERE cedula = $cedula";  
          $consulta3=$con->prepare($sql3);
          $consulta3->execute(); 
      if($consulta3->fetch(PDO::FETCH_ASSOC)){
        $sql4="UPDATE tblUsuarios SET cedula = '$cedula', nombre = '$nombre', correo = '$correo', rol = '$rol', facultad = '$facultad' WHERE cedula='$cedula'";
        $consulta=$con->prepare($sql4);
        $consulta->execute();
        header('Location: ../template/views/contratista.php?mensaje=actualizado');
      }else{ 
           $sql2="INSERT INTO `tblusuarios`(`cedula`, `nombre`, `rol`, `facultad`,`usuario`, `contrasena`) 
           VALUES ('$cedula','$nombre','$rol', '$facultad', '$cedula','$cedula')";
           $consulta2=$con->prepare($sql2);
           $consulta2->execute(); 
           header('Location: ../template/views/index.php?mensaje=registrado'); 
        
        }        
}



?>  