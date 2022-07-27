<?php
session_start();
include_once 'conexion.php';
  $usuario=isset($_POST['nomusuario'])?$_POST['nomusuario']:"";
  $clave=isset($_POST['conusuario'])?$_POST['conusuario']:"";
  $con=new Conexion();
  $con=$con->conectar();  


  if($con){      
      $sql="SELECT usuario,nombre, contrasena,rol FROM tblUsuarios WHERE usuario='$_POST[nomusuario]' AND contrasena='$_POST[conusuario]' ";  
          $consulta=$con->prepare($sql);
          $consulta->execute();  
          if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){    
                      session_start();                      
                      $_SESSION['loggedin'] = true;
                      $_SESSION['username'] = $usuario; 
                      $_SESSION['nombre'] = $fila['nombre'];                       
                      $_SESSION['rol'] = $fila['rol']; 
                      if ($fila['rol']=="admin"){
                        header("Location: ../template/views/index.php");
                      }
                      else if($fila['rol']=="Estudiante"){
                        header("Location: ../template/views/estudiante.php");
                      }else if($fila['rol']=="Asesor escenario de prácticas"){
                        header("Location: ../template/views/creacionCentro.php");
                      }else if($fila['rol']=="Coordinador de facultad"){
                        header("Location: ../template/views/listaRevisionFacultad.php");
                      }else if($fila['rol']=="Coordinador de programa"){
                        header("Location: ../template/views/listaRevisionFacultad.php");
                      }else if($fila['rol']=="Decano"){
                        header("Location: ../template/views/estudiante.php");
                      }

                      else header("Location: ../template/views/respuesta.php" );
                      
                    }                     
                    else {
                      $_SESSION['username'] = "El usuario no existe o la contraseña está equivocada"; 
                      header('Location: ../template/views/inicioSesion.php?mensaje=noExiste'); 
                    }                 
      
          }
        
        
?>

  
   
  