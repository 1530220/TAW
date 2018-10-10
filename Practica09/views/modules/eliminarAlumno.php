<?php  
	//verificar el get con el id para saber si existe, lo que significa que se selecciono eliminar en un alumno especifico
	if(isset($_GET['id'])){
		//instanciar el controlador
		$eliminarAlumno = new MvcController();
		//ejecutar el metodo para eliminar un alumno con el id de parametro
		$eliminar = $eliminarAlumno->eliminarAlumnoController($_GET['id']);
	}
?>