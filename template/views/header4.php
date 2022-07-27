<?php
  session_start();   
?>  
<nav class="navbar navbar-expand-lg navbar-light bg-light container mb-4">
  <div class="container-fluid">
  <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                ?>
                <a class="navbar-brand" href="#"><?php echo $_SESSION['nombre'] ?></a>
                <?php                
              }
              else {
                header("Location: ../views/inicioSesion.php");
              }
            ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" href="listaRevisionFacultad.php">Centro de prácticas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="registroContrato.php">Proceso de prácticas</a>
        </li>
      </ul>
    </div>
    
    <div>
    <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                ?>
      <a class="btn" href="../views/inicioSesion.php">Salir <i class="fas fa-sign-out-alt"></i></a>
      <?php                
              }
            ?>
    </div>
    
  </div>
</nav>