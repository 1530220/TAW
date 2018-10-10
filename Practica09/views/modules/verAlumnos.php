<?php  
	//si existe un valor registro en el metodo get qiere decir que se realizo el registro
	if(isset($_GET['registro'])){
		echo "<script>alert('Se ha registrado el alumno')</script>";
	}
	//si existe un valor eliminar en el metodo get qiere decir que se realizo la eliminacion
	if(isset($_GET['eliminar'])){
		echo "<script>alert('Alumno eliminado correctamente')</script>";	
	}
	//si existe un valor editado en el metodo get qiere decir que se realizo la edicion
	if(isset($_GET['editado'])){
		echo "<script>alert('Datos del alumno actualizados correctamente')</script>";		
	}
	//instanciar el controlador
	$verAlumnos = new MvcController();
	//realizar el metodo para guardar la informacion de los alumnos y mostrarlos en la tabla
	$infor_ver = $verAlumnos->alumnosController();
?>


<div class="container">
	<br><br><h3 align="center">Alumnos Registrados</h1><br>
	<table class="table">
		<thead>
			<th>Matricula</th>
			<th>Nombre</th>
			<th>Carrera</th>
			<th>Situacion</th>
			<th>Email</th>
			<th>Tutor</th>
			<th>Perfil</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</thead>
		<tbody>
		<?php foreach ($infor_ver as $datos) { ?>
			<tr>
				<td> <?php echo 1530000+$datos['matricula'] ?></td>	
				<td> <?php echo $datos['nombre'] ?></td>	
				<td> <?php echo $datos['carrera'] ?></td>	
				<td> <?php echo $datos['situacion'] ?></td>	
				<td> <?php echo $datos['email'] ?></td>	
				<td> <?php echo $datos['tutor'] ?></td>	
				<td> <a href="index.php?enlace=infoAlumno&id=<?php echo $datos['matricula']?>">Ver</a></td>
				<td> <a href="index.php?enlace=editarAlumno&id=<?php echo $datos['matricula']?>">Modificar</a></td>	
				<td> <a href="index.php?enlace=eliminarAlumno&id=<?php echo $datos['matricula']?>">Eliminar</a></td>	
			</tr>
		<?php } ?>
		</tbody>

	</table>
</div>