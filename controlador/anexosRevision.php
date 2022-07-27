<?php
session_start(); 
include_once 'conexion.php';
  $con=new Conexion();
  $con=$con->conectar();
  $nit=$_POST['nit'];

  //print_r ($_POST); 
    if($con){ 
       $sql1="SELECT * FROM tbllistaanexos";  
                  $consulta1=$con->prepare($sql1);
                  $consulta1->execute();  
                  while ($fila1=$consulta1->fetch(PDO::FETCH_ASSOC)){ 
                        $nombre = $fila1['nombre'];
                        $titulo = $fila1['titulo'];
                        $texto = $fila1['texto'];    
                        $observacion = 'observacion'.$fila1['nombre'];                         
                        $sql="UPDATE tblanexos SET $nombre='$_POST[$nombre]' WHERE nitEmpresa = '$nit' ";
                          $consulta=$con->prepare($sql);
                          $consulta->execute(); 
                        if ($_POST[$observacion] != ""){
                          $sql3= "INSERT INTO `tblobservaciones`(`nombre`, `nit`, `observacion`) VALUES ('$nombre','$nit','$_POST[$observacion]')";
                          $consulta3=$con->prepare($sql3);
                          $consulta3->execute(); 
                        }
                    }
                    
                  header('Location: ../template/views/revisionCentro.php?nit='.$nit);
                  }
?>    
		
	
 