<?php  
	include 'conexion.php';

	$consulta_persona = "SELECT * FROM persona";
	$select_persona = $pdo ->prepare($consulta_persona);
	$select_persona->execute();
	$resultados = $select_persona->fetchAll(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Practica 02 Formularios</title>
</head>
<style type="text/css">
	table,th,td{
		border:1px solid black;
	}	
</style>
<body>
	<br>
	<a href="index.php">Atras</a>
	<center>
		<h2>Personas Registradas</h2>
		<table>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Genero</th>
			<th>Editar</th>
			<th>Borrar</th>
			<?php foreach ($resultados as $dato) {?>
			<tr>	
				<td><?php echo $dato['id'] ?></td>
				<td><?php echo $dato['nombre'] ?></td>
				<td><?php echo $dato['apellidos'] ?></td>
				<td><?php echo $dato['genero'] ?></td>
				<td><a href="editar.php?id=<?php echo $dato['id']?>">Editar</a></td>
				<td><a href="borrar.php?id=<?php echo $dato['id']?>">Borrar</a></td>
			</tr>
			<?php } ?>
		</table>
	</center>

</body>
</html>