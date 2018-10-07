<h1>Iniciar Sesion</h1>
<br>
<form method="post">
	<input type="text" name="usuarioIngresar" placeholder="Usuario" required>
	<input type="password" name="passwordIngresar" placeholder="Contraseña" required>
	<input type="submit" value="Ingresar">
</form>

<?php 
	//Enviar los datos al controlador mvcController 
	if(isset($_SESSION['usuario'])){
		header("location: index.php");
	}else{
		$ingreso = new MvcController();
		//ejecutar el controlador para el login
		$ingreso->ingresarUsuarioController();
		if(isset($_GET['action'])){
			if($_GET['action']=='fallo'){
				//se indica mediante una alerta que el usuario o la contraseña es invalida
				echo "<script>alert('Usuario o contraseña incorrecta.')</script>";
			}
		}

	}

?>