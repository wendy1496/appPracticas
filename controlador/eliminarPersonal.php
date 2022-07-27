<?php
include_once "conexion.php";
session_start();
$personal= $_GET['personal'];
$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="DELETE FROM `tblrefpersonales` WHERE refPersonales_id = '$personal'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/estudiante.php');
         
}
