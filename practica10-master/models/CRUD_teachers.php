<?php 
	
	// Se incluye el archivo de conexión
	include_once "connection.php";
	
	// Se crea una clase para todas las operaciones que hará el maestro

	class teacher extends connection{

		// Método que asigna una tutoría
		function addTutorialsModel($id_maestro, $fecha, $hora, $tipoTutoria, $problematica){
			// consulta sql			
			$sql = "INSERT INTO tutoria (id_maestro,fecha,hora,tipoTutoria,problematica) VALUES (?,?,?,?,?)";

			// Se pasa la consulta como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia y se retorna si se regresa con éxito
			if($stmt->execute([$id_maestro, $fecha, $hora, $tipoTutoria, $problematica])){ return true; }
			else { return false; }				
		}
	}// end class

 ?>