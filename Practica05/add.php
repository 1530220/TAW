<?php
  include_once('db/db_conection.php');

  
  if($_GET){
    $id_type = $_GET["t"];// id_type para la tabla sport_team de la base de datos
  }

  if($_POST){
    //Se revisa que las variables nombre y email se esten recibiendo mediante el metodo POST para despues continuar
    //con la insercion de los valores ingresados en la base de datos, para finalmente redireccionar al inicio
    if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['posicion']) && !empty($_POST['carrera']) && !empty($_POST['email'])){
        add($_POST['id'],$_POST['nombre'],$_POST['posicion'],$_POST['carrera'],$_POST['email'],$id_type);
        header("location: listado.php?t=".$id_type); //se manda la variable para saber de si se mostrara el listado de basquetball o de futball
    }else{
      echo "<script> alert('Favor de llenar todos los campos');</script>"; //alerta que se mostrar si no se llenan todos los campos
    }
  }
  

//id, nombre, posicion, carrera, email, id_type
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar un jugador</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php require_once('header.php'); ?>
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Agregar Nuevo Jugador</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="add.php?t=<?php echo($id_type) ?>">
                  <label for="id">ID:</label>
                  <input type="text" name="id"><br>
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre"><br>
                  <label for="posicion">Posicion:</label>
                  <input type="text" name="posicion"><br>
                  <label for="carrera">Carrera:</label>
                  <select name="carrera">
                    <option value="ITI">Ing. Tecnologias de la Informacion</option>
                    <option value="IM">Ing. Mecatronica</option>
                    <option value="ISA">Ing. Sistemas Automotrices</option>
                    <option value="PyMEs">Lic. Administracion y Gestion de PyMEs</option>
                    <option value="ITM">Ing. Tecnologias de Manufactura industrial</option>
                  </select>
                  <label for="email">Email:</label>
                  <input type="email" name="email"><br>
                  <button type="submit" class="success">Guardar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>