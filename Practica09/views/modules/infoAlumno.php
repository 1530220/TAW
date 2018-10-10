<?php  

	//se verifica si existe un get con el id de un alumno
	if(isset($_GET['id'])){
		$matricula = $_GET['id'];
		//instanciar el controlador
		$perfil = new MvcController();
		//se guarda la informacion de un alumno especifico deacuerdo a la matricula del alumno
		$informacion = $perfil->informacionAlumnoID($matricula);
	}
	
?>

<div class="container">
	<br><br><h3>Perfil de Alumno</h3><br>
	<div class="row">
		<div class="col">
			<img src="<?php echo $informacion['imagen'] ?>" alt="<?php echo 1530220+$informacion['matricula'] ?>" width="200" height="200">
		</div>
		<div class="col-8">
			<strong>Matricula:</strong>
			<label><?php echo 1530220+$informacion['matricula'] ?></label><br>
			<strong>Nombre:</strong>
			<label><?php echo $informacion['nombre'] ?></label><br>
			<strong>Email:</strong>
			<label><?php echo $informacion['email'] ?></label><br>
			<strong>Situacion academica:</strong>
			<label><?php echo $informacion['situacion'] ?></label><br>
			<strong>Carrera:</strong>
			<label><?php echo $informacion['carrera'] ?></label><br>
			<strong>Tutor:</strong>
			<label><?php echo $informacion['tutor'] ?></label>
		</div>
	</div>
	<center><br><a href="index.php?enlace=verAlumnos" class="btn btn-primary">Atras</a></center>
</div>