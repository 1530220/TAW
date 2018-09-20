<?php  
  //login
  include_once('db/db_conection.php');
  session_start(); //iniciar sesion

    if($_POST){
      if (!empty($_POST['usuario']) && !empty($_POST['contraseña'])) {  /*si se ingreso un usuario y contraseña*/
        $var = consultar_user($_POST['usuario'],$_POST['contraseña']); //verificar si existe 

        if($var==1){ //si existe
          $_SESSION['usuario'] = $_POST['usuario']; //asignar el usuario a la variable usuario de la sesion
          $result = verificar_correo($_POST['usuario']); //obtener id de user para realizar
          $id = $result['id'];                      //la insercion a la tabla user_log

          $fecha = date("Y-m-d"); //obtener la fecha del sistema en formato, año-mes-dia
          insert_log($fecha,$id); //insertar la fecha y el id del usuario en la tabla user_log
          header("location: inicio.php"); //ver pantalla de inicio
        }else{
           //alertar al usuario que tiene un error en la contraseña o el usuario
          echo "<script>alert('Usuario o contraseña incorrecta');</script>"; 
        }
      }else{
        //alertar al usuario que debe ingresar un usuario y contraseña
        echo "<script>alert('Favor de ingresar usuario y contraseña');</script>";
      }
    }
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 06</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <center>
      <br><h1>Iniciar Sesion</h1><hr>
    </center>
    <br><br>
    <div class="row">
    <section class="section">
    <div class="content" data-slug="panel1">
        <form method="POST" action="index.php">
          <h4>Correo Electronico:</h4>
          <input type="text" name="usuario" required>
          <h4>Contraseña:</h4>
          <input type="password" name="contraseña" required>
          <center>
            <button type="submit" class="primary">Ingresar</button>
            <a href="registrar_user.php" class="button">Registrarse</a>
          </center>

        </form>
    </div>
    </section>
    </div>


    </body>
    </html>