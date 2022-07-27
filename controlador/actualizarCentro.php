<?php
include_once "conexion.php";
session_start();
$nit= $_REQUEST['nit'];
$nombre= $_REQUEST['nombreEmpresa'];
$actividad= $_REQUEST['actividad'];
$facultad= $_REQUEST['facultad'];
$fecha= $_REQUEST['fechaConvenio'];
$contacto= $_REQUEST['nombreContacto'];
$correo= $_REQUEST['correo'];
$telefono= $_REQUEST['telefono'];
$direccion= $_REQUEST['direccion'];
$capacidad= $_REQUEST['capacidad'];
$convenio= $_REQUEST['convenio'];
$cupos= $_REQUEST['cuposAsignados'];


print_r($_REQUEST);
$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="UPDATE`tblcentropracticas` SET `nombre`='$nombre',`convenio`='$convenio',`fecha`='$fecha',`contacto`='$contacto',`correo`='$correo',`telefono`='$telefono',`direccion`='$direccion',`actividad`='$actividad',`facultad`='$facultad',`capacidad`='$capacidad',`cupos`='$cupos' WHERE nit = '$nit'";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          header('Location: ../template/views/actualizarCentro.php?nit='.$nit);        
}
?>    	