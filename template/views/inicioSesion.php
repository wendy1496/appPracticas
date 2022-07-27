<?php  
  include_once "header.php"
?>

<div class="container">
      <div class="row">
        <div class="col-sm-6 offset-md-3">
        <form class="form-signin" action="../../controlador/login.php" method="post">   
        <h2 class=" form-signin-heading" align="center">Inicio Sesión</h2>
        <center><p>Para el primer ingreso, el nombre de usuario y la contraseña son el documento de identidad</p></center>
        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'noExiste'){
            ?>
              <div class=" mb-2 mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                <p>El usuario no existe o la contraseña es incorrecta</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
            ?> 
        <div class="col-xs-4 col-xs-offset-4"> 
        <div class="mb-2 mt-2 form-group" align="center">                
          <input type="text" id="nomusuario" name="nomusuario" class="form-control" placeholder="Nombre de usuario" required=""><!--required autofocus-->
        </div>      
        <div class="mb-2 mt-2 form-group" align="center">           
          <input type="password" id="conusuario" name="conusuario" class="form-control" placeholder="Contraseña" required=""><!--required autofocus-->
        </div> 
        <div class="mb-4 row pt-2 text-center">
                  <div class="col-12">
                  <button class="btn btn-success " type="submit"  ><i class="fas fa-sign-in-alt"></i> Entrar</button>   
                  </div>
                </div>                
       <!-- <a class="btn btn-info " href="registro.php" role="button" disabled><span class="icon-add-user" ></span>  Registrarse</a> -->
        </div>     
        </form>
      </div>
    </div>
  </div>
  <?php  
  include_once "footer.php"
?>