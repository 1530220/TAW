<h1>Registro de Usuario</h1>
<br>
<form method="post">
	<input type="text" name="usuarioRegistro" placeholder="Usuario" required>
	<input type="password" name="passwordRegistro" placeholder="Contraseña" required>
	<input type="email" name="emailRegistro" placeholder="Email" required>
	<input type="submit" value="Enviar">
</form>

<?php 
	//Enviar los datos al controlador mvcController 
	
	$registro = new MvcController();
	//se invoca la funcion registroUsuarioController de la clase mvcController

	$registro->registroUsuarioController();
	if(isset($_GET['eliminar'])){
		//si existe un parametro eliminar en el metodo get se indica que se ha eliminado la cuenta 
		//que se encontraba logueada
		echo "<script>alert('Haz eliminado tu cuenta.')</script>";
	}
	if(isset($_GET['action'])){
		if($_GET['action']=='ok'){
			//indica que el registro a sido exitoso
			echo "<script>alert('Registro Exitoso!!')</script>";
		}
	}
?>