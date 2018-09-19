
<!DOCTYPE html>
<html>
<head>
	<title>Praciica 02 Formularios</title>
</head>
<body>
	<br><a href="ver.php">Ver personas registradas.</a>
	<center>
		<form method="post" action="registrar.php">
			<h1>Ingresar Persona</h1><br>
			<label>Nombre:</label>
			<input type="text" name="nombre" placeholder="Nombre"><br><br>
			<label>Apellidos:</label>
			<input type="text" name="apellidos" placeholder="Apellidos"><br><br>
			<label>Genero:</label>
			<input type="radio" name="genero" value="M">Masculino
			<input type="radio" name="genero" value="F">Femenino
			<br><br>
			<input type="submit" value="Guardar">
		</form>
	</center>
</body>
</html>
