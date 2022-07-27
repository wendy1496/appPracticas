<?php
include_once "conexion.php";
session_start();
$idioma= $_GET['idioma'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      print_r ("entra acá"); 
      print_r ($idioma); 
      $sql="DELETE FROM `tblidiomas` WHERE idioma_id = '$idioma'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/estudiante.php');
         
}
