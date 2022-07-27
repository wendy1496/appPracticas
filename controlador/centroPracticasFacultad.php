<?php
include_once "conexion.php";
session_start();
$nit= $_REQUEST['nit'];
$rol= $_REQUEST['rol'];
$facultad= $_REQUEST['facultad'];

print_r($_REQUEST);
$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO `tblcentrofacultad`(`nit`, `modalidad`, `tipoContrato`)
      VALUES ('$nit', '$rol', '$facultad') ";  
      $consulta=$con->prepare($sql);
      $consulta->execute();

          header('Location: ../template/views/creacionCentro.php?mensaje=registrado');
         
}
