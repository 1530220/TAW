<?php 

	// Se incluye el archivo de conexion
	include_once "connection.php";

	// Clase para hacer el crud de los alumnos
	class studentsData extends connection{

		// Método para traer los datos de los alumnos
		function getAllStudentsModel(){
			// Consulta sql
			$sql = "SELECT * FROM alumnos";

			// Se pasa la consulta como parámetro en el método prepare conformado por el objeto
			// PDOStatement conformado por el método conectar de la clase connection
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la consulta
			$stmt->execute();

			// Se guarda en un array los registros encontrados
			$respuestaModel = $stmt->fetchAll();

			// Se retorna el array
			return $respuestaModel;
		}



		// Método para traer los datos de un solo alumno
		function getOneStudentModel($id_alumno){
			// Consulta sql
			$sql = "SELECT * FROM alumnos WHERE id=?";

			// Se pasa la consulta como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la consulta
			$stmt->execute();

			// Se almacena en un array los que tenga la consulta
			$respuestaModel = $stmt->fetch();

			// Si el array está vacío se retorna false, caso contrario retorna el array
			if($respuestaModel == false){ return false; }
			else{ return $respuestaModel; }
		}


		 
	} // end class


 ?>