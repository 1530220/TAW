<?php  
	include "conexion.php";

	if($_GET){

		$id = $_GET['id'];
		$select_id ="SELECT * FROM persona WHERE id = ?";
		$consultar_id = $pdo-> prepare($select_id);
		$consultar_id ->execute(array($id));

		$r = $consultar_id->fetch();
	}

	if($_POST){
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$genero = $_POST['genero'];
		$sql_editar = "UPDATE persona SET nombre = ?, apellidos = ?,genero = ? WHERE id = ?";
		$update_persona = $pdo-> prepare($sql_editar);
		$update_persona ->execute(array($nombre,$apellidos,$genero,$id));

		header("location:ver.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Persona</title>
</head>
<body>
	<br><a href="index.php">Atras.</a>
	<center>
		<form method="post">
			<h1>Editar Persona</h1><br>
			<label>Nombre:</label>
			<input type="text" name="nombre" value="<?php echo $r['nombre'] ?>"><br><br>
			<label>Apellidos:</label>
			<input type="text" name="apellidos" value="<?php echo $r['apellidos'] ?>"><br><br>
			<label>Genero:</label>
			<input type="radio" name="genero" value="M" >Masculino
			<input type="radio" name="genero" value="F">Femenino
			<br><br>
			<input type="submit" value="Editar">
		</form>
	</center>
</body>
</html>