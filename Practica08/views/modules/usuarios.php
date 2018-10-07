<?php
	//si no existe un usuario logueado se procede a ir al formulario de ingresar
	if(!isset($_SESSION['usuario'])){
		header("location: index.php?action=ingresar");
	}else{
		//instancia de la clase MvcController
		$verUsers = new MvcController();
		//ejecutar el controlador que devuelve los usuarios registrados
		$usuarios = $verUsers->verUsuariosController();
		if($_GET['action']=="cambio"){//se ha realizado un cambio en los usuarios
			if(isset($_GET['delete_success'])){
				//si el cambio fue el delete de un usuario se indica que fue exitoso
				echo "<script>alert('Usuario eliminado correctamente')</script>";	
			}else{
				//sino significa que el cambio fue una actualizacion
				echo "<script>alert('Datos actualizados exitosamente')</script>";
			}
		}
	}
?>

<br><h1>Lista de usuarios</h1><br>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		<!--ciclo para recorrer los registros contenidos en $usuarios_-->
		<?php foreach ($usuarios as $datos){ ?>
		<tr>
			<td><?php echo $datos['id'] ?></td>
			<td><?php echo $datos['usuario'] ?></td>
			<td><?php echo $datos['password'] ?></td>
			<td><?php echo $datos['email'] ?></td>
			<!--modificar, se manda el id del usuario a modificar-->
			<td><a href="index.php?action=editar&id=<?php echo $datos['id'] ?>">modificar</a></td>
			<!--eliminar, se manda el usuario a eliminar-->
			<td><a href="index.php?action=eliminar&usuario=<?php echo $datos['usuario'] ?>">eliminar</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
