<?php
include_once "conexion.php";
session_start();
$nit= $_REQUEST['nit'];
$nombreEmpresa= $_REQUEST['nombreEmpresa'];
$actividad= $_REQUEST['actividad'];
$facultad= $_REQUEST['facultad'];
$fecha= $_REQUEST['fechaConvenio'];
$contacto= $_REQUEST['nombreContacto'];
$correo= $_REQUEST['correo'];
$ciudad= $_REQUEST['ciudad'];
$pagina= $_REQUEST['paginaWeb'];
$telefono= $_REQUEST['telefono'];
$direccion= $_REQUEST['direccion'];
$capacidad= $_REQUEST['capacidad'];
$convenio= $_REQUEST['convenio'];
$cupos= $_REQUEST['cuposAsignados'];


print_r($_REQUEST);
$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO `tblcentropracticas`(`nit`, `nombre`, `convenio`, `fecha`, `contacto`, `paginaWeb`, `correo`, `telefono`, `direccion`, `ciudad`, `actividad`, `facultad`, `capacidad`, `cupos`)
      VALUES ('$nit','$nombreEmpresa', '$convenio', '$fecha', '$contacto', '$pagina', '$correo', '$telefono', '$direccion','$ciudad', '$actividad', '$facultad', '$capacidad', '$cupos') ";  
      $consulta=$con->prepare($sql);
      $consulta->execute();
          
      $sql2="INSERT INTO `tblanexos`(`nitEmpresa`, `cedulaRepresentante`, `rutPracticas`, `certificadoExist`, `certificadoAntecR`, `certificadoAntecC`, `certificadoFiscalesR`, `certificadoFiscalesC`, `certificadoJudiciales`, `medidasCorrectivas`, `inhabilidades`, `situacionMilitar`, `declaracion`) 
      VALUES ('$nit', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar', 'Sin enviar','Sin enviar', 'Sin enviar', 'Sin enviar')";  
              $consulta2=$con->prepare($sql2);
              $consulta2->execute();  

          header('Location: ../template/views/creacionCentro.php?mensaje=registrado');
         
}
