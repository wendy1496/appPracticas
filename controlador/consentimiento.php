<?php
session_start(); 
include_once 'conexion.php';

  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql1="SELECT * FROM tbllistaestudiante";  
                  $consultax=$con->prepare($sql1);
                  $consultax->execute();  
                  while ($fila1=$consultax->fetch(PDO::FETCH_ASSOC)){ 
                        $nombre = $fila1['nombre'];
                        $titulo = $fila1['titulo'];
                        $texto = $fila1['texto'];
                        if (! ($_FILES[$nombre]["error"] > 0) ){   
                            $tamano = $_FILES[$nombre]['size'];      
                        if($tamano > 0) {                     
                            move_uploaded_file($_FILES[$nombre]['tmp_name'],  "anexos/".$texto.$_SESSION['username'].".pdf");
                            echo "Hoja de vida subida correctamente";
                            $sql="UPDATE tblanexoestudiante SET $nombre='Enviado' WHERE estudiante='$_SESSION[username]' ";
                            $consulta=$con->prepare($sql);
                            $consulta->execute();
                    }
                  }
                }
            header('Location: ../template/views/estudiante.php');     
                  
                }
            
                
?> 


