<?php  
	include "db/db_conection.php";

	if ($_POST) {
		$email = $_POST['email'];
		$password1 = $_POST['contraseña1'];
		$password2 = $_POST['contraseña2'];
		$estatus = $_POST['estatus'];
		$tipo = $_POST['tipo'];

		if($password2 === $password1){
      $verificacion = verificar_correo($email);
      if($verificacion == 2){
        echo "<script>alert('Registro existoso!');</script>";
        registrar_user($email,$password1,$estatus,$tipo);
        header("location: index.php");
      }else{
        echo "<script>alert('Ya se ha utilizado el correo ingresado con otra cuenta.');</script>";
      }
		}else{
			echo "<script>alert('Las contraseñas ingresdas no coinciden');</script>";
		}
	}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar nuevo user</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
  	<center>
  		<br><h2>Agregar nuevo usuario</h1><hr>
  	</center>
  	<br>
    <div class="row"> 
      <div class="large-9 columns">
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="registrar_user.php">
                  <label for="email">Correo Electronico:</label>
                  <input type="email" name="email" required>
                  <label for="contraseña1">Contraseña:</label>
                  <input type="password" name="contraseña1" required>
                  <label for="contraseña2">Confirmar contraseña:</label>
                  <input type="password" name="contraseña2" required>
                  <label for="estatus">Estatus:</label>
                  <select name="estatus" required>
                  	<option value="1">Activo</option>	
                  	<option value="2">Inactivo</option>
                  </select>
                  <label for="tipo">Tipo:</label>
                  <select name="tipo" required>
                  	<option value="1">Usuario final</option>
                  	<option value="2">Administrador</option>
                  </select>
                  
                  <br><button type="submit" class="right success">Guardar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>