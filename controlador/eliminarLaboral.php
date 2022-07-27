<?php
include_once "conexion.php";
session_start();
$expLaboral= $_GET['expLaboral'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="DELETE FROM `tblexplaboral` WHERE expLab_id = '$expLaboral'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/estudiante.php');
         
}
