<?php  
  include "db/db_conection.php";
  session_start();//sesion

  $r = verificar_correo($_SESSION['usuario']); //buscar el registro del usuario en sesion activo

  if($_POST){
    $email = $_POST['email']; //guardar correo
    $password1 = $_POST['contraseña1']; //guardar contraseña
    $password2 = $_POST['contraseña2']; //guardar confirmacion de contraseña
    $estatus = $_POST['estatus']; //guardar status
    $tipo = $_POST['tipo']; //guardar user_type

    if($password2 === $password1){ //si las contraseñas son iguales se actualizan los datos
      echo "<script>alert('Actualizacion existosa!');</script>";
      update_user($email,$password1,$estatus,$tipo);  //funcion para actualizar un user
      header("location: inicio.php"); //redireccionar al inicio
    }else{
      //alerta para decirla al usuario que las contraseñas no coinciden
      echo "<script>alert('Las contraseñas ingresdas no coinciden');</script>";
    }
  }
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar Perfil</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
  	<center>
  		<br><h2>Actualizar mi informacion</h1><hr>
  	</center>
  	<br>
    <div class="row"> 
      <div class="large-9 columns">
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="update_user.php">
                  <label for="email">Correo Electronico:</label>
                  <input type="email" name="email" value="<?php echo $r['email'] ?>" disabled>
                  <label for="contraseña1">Contraseña:</label>
                  <input type="password" name="contraseña1" value="<?php echo $r['password'] ?>" required>
                  <label for="contraseña2">Confirmar contraseña:</label>
                  <input type="password" name="contraseña2" value="<?php echo $r['password'] ?>" required>
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
                  
                  <br><button type="submit" class="right success">Actualizar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>