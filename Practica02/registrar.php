<?php 
	include 'conexion.php';
			
	if ($_POST) {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$genero = $_POST['genero'];	


		$consulta_insert = "INSERT INTO persona (nombre,apellidos,genero) VALUES (?,?,?)";

		$insert_persona = $pdo->prepare($consulta_insert);
		$insert_persona ->execute(array($nombre,$apellidos,$genero));

		echo "<h3>Persona Registrada!</h3>";	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br><br>
	<a href="index.php">Atras</a>
</body>
</html>