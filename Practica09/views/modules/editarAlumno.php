<?php  
	//se verifica si existe un id mediante el metodo get
	if(isset($_GET['id'])){
		//instanciar la clase del controlador
		$info_alumno_id = new MvcController();
		//guardar los datos de las carreras y tutores y datos de alumno para mostrarlos en el formulario
		$info_carreras = MvcController::carrerasController();
		$info_tutor = MvcController::tutorController();
		$info = $info_alumno_id->informacionAlumnoID($_GET['id']);
		//si existe un post se realiza la edicion de alumno
		if($_POST){
			//instanciar la clase del controlador
			$editarAlumno = new MvcController();
			//realizar el motod de editar con el id de parametro
			$editarAlumno->editarAlumnoController($_GET['id']);
		}
	}
?>

<div class="container">
	<br><br><h3 align="center">Editar datos del alumno</h1>

	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nombre:</label>
			<input type="text" class="form-control" name="nombre" value="<?php echo $info['nombre'] ?>" required><br>

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
			<input type="email" class="form-control" name="email" value="<?php echo $info['email'] ?>" required><br>

			<label>Tutor:</label>
			<select name="tutor" class="form-control">
				<?php foreach ($info_tutor as $datos) { ?>
					<option><?php echo $datos['nombre'] ?></option>	
				<?php } ?>
			</select><br>

			<label>Cargar nueva fotografia:</label>
			<input type="file" name="imagen" class="form-control-file">
		</div>
		<center><input type="submit" class="btn btn-primary btn-lg" value="Editar"></center><br>
	</form>
</div>