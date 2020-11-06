<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/floating-labels.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.min.css">
  </head>

  <header class="fixed-top">
      <nav class="navbar navbar-light navHome" id="menuNav" style="height: 70px">
        <div class="container-fluid">
          <div class="row w-100 text-center d-flex justify-content-end">

            <div class="col-9">
              <span class="navTitulo">
                <a href="index.php?action=mostrarMain" id="navTitulo" style="color:white;"><p style="font-size: 1.6rem; position: absolute; bottom: -6px;">Registro Incidencias Informaticas</p></a>
              </span>
            </div>

            <?php
            if(!isset($_SESSION["username"])){
            echo '
            <div class="col-1">
              <a class="nav-link" style="color: white; padding: 0.5rem 0rem;" href="#">Registrarse</a>
            </div>

            <div class="col-2">
              <a class="nav-link" style="color: white" href="index.php?action=mostrarLogin">Iniciar sesión</a>           
            </div>';
          }
          else {
            echo '
            <div class="col-3">
              <a class="nav-link perfil" onclick="accionPerfil()">Perfil</a>
            </div>';
          }
          ?>
          </div>
        </div>
      </nav>
    </header>