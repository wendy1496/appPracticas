<?php
session_start(); 
include_once 'conexion.php';
$titulo = $_POST['titulo'];
$institucion = $_POST['institucion'];
$fecha = $_POST['fechaGrado'];
$cedula1 = $_POST['cedula1'];
$curso = $_POST['curso'];
$institucionForm = $_POST['institucionForm'];
$cedula2 = $_POST['cedula2'];
$intensidad = $_POST['intensidad'];
$fechaForm = $_POST['fechaForm'];
$idioma = $_POST['idioma'];
$nivel = $_POST['nivel'];
$cedula3 = $_POST['cedula3'];
$cargoLab = $_POST['cargoLab'];
$telLab = $_POST['telLab'];
$tiempoLab = $_POST['tiempoLab'];
$cedula4= $_POST['cedula4'];
$institucionLab = $_POST['institucionLab'];
$refPersonal = $_POST['refPersonal'];
$cargoRef = $_POST['cargoRef'];
$telRef = $_POST['telRef'];
$celRef = $_POST['celRef'];
$cedula5 = $_POST['cedula5'];
  $con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      print_r ($_FILES);
      $tamano = $_FILES['anexo']['size'];   
              if (! ($_FILES['anexo']["error"] > 0) ){   
                  $tamano = $_FILES['anexo']['size'];   
                  echo $tamano;   
                  if($tamano > 0) {                     
                           $url= move_uploaded_file($_FILES['anexo']['tmp_name'],  
                              "anexos/foto".$_POST['cedula'].".jpg");
                            $sql1="INSERT INTO `tblestudiante`(`cedulaEstudiante`, `nombre`, `fechaNacimiento`, `edad`, `telefono`, `correo`, `direccion`, `nivelPractica`, `nomPrograma`, `electiva`, `promedio`, `perfilProf`, `perfilPract`, `foto`, `contratoAprendizaje`, `entidad`, `requerimientos`, `cual`, `ciudad`, `fecha`) VALUES  ('$_POST[cedula]', '$_POST[nombreEst]', '$_POST[nacimiento]', '$_POST[edad]', '$_POST[telefono]', '$_POST[correoEst]', '$_POST[direccion]', '$_POST[nivelPrac]', '$_POST[programa]', '$_POST[electiva]', '$_POST[promedio]', '$_POST[perfilProf]', '$_POST[perfilPrac]', 'Si', '$_POST[CARL]', '$_POST[arl]', '$_POST[cProceso]', '$_POST[respuesta]', '$_POST[ciudad]', '$_POST[fechaEst]')";
                            $consulta1=$con->prepare($sql1);
                            $consulta1->execute();
                            
                            //TABLA TITULOS
      $cadena="INSERT INTO `tbltitulos`(`titulo`, `institucion`, `fechaGrado`, `cedulaEstudiante`) VALUES";
      for($i = 0; $i < count($titulo); $i++){
        $cadena.="('".$titulo[$i]."', '".$institucion[$i]."', '".$fecha[$i]."', '".$cedula1[$i]."'),";
      }
      $cadena_final = substr($cadena, 0, -1);
      $cadena_final .= ";";
      $consulta=$con->prepare($cadena_final);
      $consulta->execute();

      //TABLA FORMACIÓN COMPLEMENTARIA
      $cadena2="INSERT INTO `tblcomplementaria`(`nombre`, `institucion`, `intensidad`, `fecha`, `cedulaEstudiante`) VALUES";
      for($j = 0; $j < count($curso); $j++){
        $cadena2.="('".$curso[$j]."', '".$institucionForm[$j]."', '".$intensidad[$j]."', '".$fechaForm[$j]."', '".$cedula2[$j]."'),";
      }
      $cadena_final2 = substr($cadena2, 0, -1);
      $cadena_final2 .= ";";
      $consulta2=$con->prepare($cadena_final2);
      $consulta2->execute();

      //TABLA IDIOMAS
      $cadena3="INSERT INTO `tblidiomas`(`idioma`, `nivel`, `cedulaEstudiante`) VALUES";
      for($k = 0; $k < count($idioma); $k++){
        $cadena3.="('".$idioma[$k]."', '".$nivel[$k]."', '".$cedula3[$k]."'),";
      }
      $cadena_final3 = substr($cadena3, 0, -1);
      $cadena_final3 .= ";";
      $consulta3=$con->prepare($cadena_final3);
      $consulta3->execute();

      //TABLA EXPERIENCIA LABORAL
      $cadena4="INSERT INTO `tblexplaboral`(`institucionLab`, `cargoLab`, `tiempoLab`, `telLab`, `cedulaEstudiante`) VALUES";
      for($l = 0; $l < count($institucionLab); $l++){
        $cadena4.="('".$institucionLab[$l]."', '".$cargoLab[$l]."', '".$tiempoLab[$l]."', '".$telLab[$l]."', '".$cedula4[$l]."'),";
      }
      $cadena_final4 = substr($cadena4, 0, -1);
      $cadena_final4 .= ";";
      $consulta4=$con->prepare($cadena_final4);
      $consulta4->execute();
 
      //TABLA REFERENCIAS PERSONALES
       
      $cadena5="INSERT INTO `tblrefpersonales`(`refPersonal`, `cargoRef`, `telRef`, `celRef`, `cedulaEstudiante`) VALUES";
      for($m = 0; $m < count($refPersonal); $m++){
        $cadena5.="('".$refPersonal[$m]."', '".$cargoRef[$m]."', '".$telRef[$m]."', '".$celRef[$m]."', '".$cedula5[$m]."'),";
      }
      $cadena_final5 = substr($cadena5, 0, -1);
      $cadena_final5 .= ";";
      $consulta5=$con->prepare($cadena_final5);
      $consulta5->execute();
          
                            header('Location: ../template/views/hojaDeVida.php?mensaje=registrado');
                    }
                  }
                }
            
                
?> 


