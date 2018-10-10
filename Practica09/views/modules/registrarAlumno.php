<?php  
	//instanciar el controlador
	$info = new MvcController();
	//guardar la informacion de carreras y tutores para mostrarlos en el formulario
	$info_carreras = $info->carrerasController();
	$info_tutor = $info->tutorController();

	//si se detecta un post se procede a realizar el metodo del registro de alumno
	if($_POST){
		$info->registrarAlumnoController();
	}
?>

<div class="container">
	<br><br><h3 align="center">Registrar un Alumno</h1>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nombre:</label>
			<input type="text" class="form-control" name="nombre" placeholder="Nombre" required><br>

			<label>Carrera:</label>
			<select name="carrera" class="form-control">
				<?php foreach ($info_carreras as $datos) { ?>
					<option><?php echo $datos['nombre'] ?></option>	
				<?php } ?>
			</select><br>

			<label>Situacion Academica:</label>
			<select name="situacion" class="form-control" required>
				<option>Especial</option>
				<option>Regular</option>
				<option>Irregular</option>
			</select><br>

			<label>Correo Electronico:</label>
			<input type="email" class="form-control" name="email" placeholder="Correo Electronico" required><br>

			<label>Tutor:</label>
			<select name="tutor" class="form-control">
				<?php foreach ($info_tutor as $datos) { ?>
					<option><?php echo $datos['nombre'] ?></option>	
				<?php } ?>
			</select><br>

			<label>Cargar una fotografia:</label>
			<input type="file" name="imagen" class="form-control-file" required>
		</div>
		<center><input type="submit" class="btn btn-primary btn-lg" value="Guardar"></center><br>
	</form>
</div>