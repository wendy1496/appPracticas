<?php
include_once "conexion.php";
session_start();
$complementaria= $_GET['complementaria'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="DELETE FROM `tblcomplementaria` where complementaria_id = '$complementaria'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/estudiante.php');
         
}
