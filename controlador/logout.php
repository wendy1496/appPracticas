<?php
session_start();
unset ($SESSION['usuario']);
session_destroy();
header('Location: ../template/views/inicioSesion.php');    
exit(); 
?>


