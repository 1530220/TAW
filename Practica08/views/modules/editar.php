<?php
	//se instancia la clase MvcController
	$informacion = new MvcController();
	if($_GET){
		//si existe un parametro get[id] se guarda el 
		$id_usuario = $_GET['id'];
		//se guarda el registro que devuelve el controlador deacuerdo al id mandado 
		$info_usuario = $informacion->consultarInfoUsuarioController($id_usuario);
	}
	//si existe un post
	if($_POST){
		if($_GET){// se guarda el id obtenido del get
			$id_user = $_GET['id'];
		}
		//se ejecuta el controlador de actualizar con el id del usuario a modificar
		$informacion->actualizarUsuarioController($id_user);
	}
?>

<h1>Modificar datos</h1>
<form method="post">
	<!--se muestra en el primer input el usuario a modiciar, pero deshabilitado de modo que siempre tendra el mismo usuario(nickname)_-->
	<input type="text" name="usuarioModificar" value="<?php echo $info_usuario['usuario'] ?>" disabled>
	<!--se muestra en el input la contraseña a modificar oculta-->
	<input type="password" name="passwordModificar" value="<?php echo $info_usuario['password'] ?>" required>
	<!--se muestra en el input el email a modificar-->
	<input type="email" name="emailModificar" value="<?php echo $info_usuario['email'] ?>" required>
	<input type="submit" value="Actualizar">
</form>