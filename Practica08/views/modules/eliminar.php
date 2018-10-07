<?php  
	if(isset($_GET['usuario'])){ //si existe un get
		//guardar el usuario obtenido del get
		$usuario_eliminar = $_GET['usuario'];

		//instancia de la clase MvcController
		$eliminar = new MvcController();
		//se ejecuta el metodo para eliminar un usuario mandando el usuario
		$eliminar->eliminarUsuarioController($usuario_eliminar);
	}
?>

<br>
<h3>Contraseña requerida para continuar:</h3>
<form method="post">
	<input type="text" name="passwordEliminar" placeholder="Contraseña" required>
	<input type="submit" value="Eliminar">
</form>