<?php
include_once('db/db_conection.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';  //Se revisa que el id del usuario se encuentre mediante el metodo get.
$t = isset( $_GET['t'] ) ? $_GET['t'] : '';

$r = search($id,$t); //Se realiza una busqueda en la base de datos donde se obtienen los atributos del registro con el id ingresado.

//Se revisa que la variable nombre y email, se encuentren definidas, para posteriormente realizar la actualizacino y al final se
//realiza un redireccionado a la pagina principal.
if(isset($_POST['nombre']) && isset($_POST['posicion']) && isset($_POST['carrera']) && isset($_POST['email'])){
  update($id,$_POST['nombre'],$_POST['posicion'],$_POST['carrera'],$_POST['email'],$t);
  header("location: listado.php?t=".$t);
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Agregar Nuevo Usuario</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <form method="POST" action="update.php?id=<?php echo($id)?>&t=<?php echo($t) ?>">
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" value="<?php echo($r['nombre'])?>"><br>
                  <label for="posicion">Posicion:</label>
                  <input type="text" name="posicion" value="<?php echo($r['posicion'])?>"><br>
                  <label for="carrera">Carrera:</label>
                  <select name="carrera">
                    <option value="ITI">Ing. Tecnologias de la Informacion</option>
                    <option value="IM">Ing. Mecatronica</option>
                    <option value="ISA">Ing. Sistemas Automotrices</option>
                    <option value="PyMEs">Lic. Administracion y Gestion de PyMEs</option>
                    <option value="ITM">Ing. Tecnologias de Manufactura industrial</option>
                  </select>
                  <label for="email">Email:</label>
                  <input type="email" name="email" value="<?php echo($r['email'])?>"><br>
                  <button type="submit" class="success">Actualizar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>