<?php
if(isset($_SESSION["username"])){header("location: index.php?action=mostrarHome");}

?>
<main style="position: absolute; left: 50%; top: 65%; transform: translate(-50%, -65%);">
    <form class="form-signin inicio mx-auto" id="Inicio_Sesion">
      <div class="text-center mb-4">
        <img class="mb-4" src="assets/images/login.svg" alt="" width="150" height="150">
        <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      </div>
      <?php 
        if(isset($data["msjError"])){
            echo "<p class='text-center'>".$data['msjError']."</p>";
        }
        if(isset($data["msjInfo"])){
          echo "<p class='text-center'>".$data['msjInfo']."</p>";
        }
    ?>
      <div class="form-label-group">
        <input type="text" name="userOemail" id="userOemail" class="form-control" placeholder="Email" autofocus required>
        <label for="userOemail">Usuario o Email</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña" required>
        <label for="pass">Contraseña</label>
      </div>

      <input type="hidden" name="action" value="procesarLogin">
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar sesión">
    </form>
</main>