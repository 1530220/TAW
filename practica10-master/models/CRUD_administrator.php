<?php 
	
	include_once "connection.php";

	/* Clase que maneja los datos */
	class administrator extends connection{


		#GENERAL--------------------------------------------------
			#--------------------------------
		// Método que trae los datos de una tabla en específico ($table)
		function getAllModel($table){
			//Consulta 	sql
			$sql = "SELECT * FROM $table";

			// Se pasa la consulta como parámetro del método prepare del PDOStatement Object
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia
			$stmt->execute();

			// Se almacena en un array los registros encontrados
			$respuestaModel = $stmt->fetchAll(PDO::FETCH_ASSOC);

			// Si el array no es vacío, lo retorna, caso contrario retorna false
			if($respuestaModel){ return $respuestaModel; }
			else { return false; }

		}


		#USUARIOS ------------------------------------------------
			#---------------------------------------------------
		// Método que agrega usuarios dependiendo del tipo
		function addUserModel($name,$email,$type,$password){
			// Consulta sql
			$sql = "INSERT INTO usuarios (nombre,email,tipo,password) VALUES (?,?,?,?)";

			// Se manda la consulta como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la consulta y se retorna true en caso de que se realizó con éxito
			if($stmt->execute([$name,$email,$type,$password])){ return true; }
			else { return false; }
		}


		
		#CARRERAS ------------------------------------------------
		 #-----------------------------------
		// Método que agrega carreras
		function addCareerModel($nameCareer){			
			// Sentencia sql
			$sql = "INSERT INTO carreras (nombreCarrera) VALUES (?)";

			// Se pasa la consulta como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia
			// Si se ejecuta con éxito retorna true, caso contrario false
			if($stmt->execute([$nameCareer])){ return true; }
			else { return false; }
		}


		//Método que modifica carrera
		function updateCareerModel($id_carrera, $nombreCarrera){
			// consulta sql
			$sql = "UPDATE carreras SET nombreCarrera=? WHERE id=?";

			// Se pasa la consulta con el método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta y se verifica si se ejecutó con éxito (true)
			if($stmt->execute([$nombreCarrera, $id_carrera])){ return true; }
			else { return false; }
		}


		// Método que elimina carreras CREO QUE ESTO NO SE NECESITA
		/*function deleteCareerModel($id_carrera){
			// Consulta sql
			$sql = "DELETE FROM carreras WHERE id=?";

			// Se pasa la consulta como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la consulta y se devuelve true si se realizó con éxito
			if($stmt->execute([$id_carrera])){ return true; }
			else{ return false; }
		}*/



		#MAESTROS - TUTORES ------------------------------------------------
			#-------------------------------------------
		// Método para agregar maestros
		function addTeacherModel($name, $career, $email, $password, $foto){
			// Sentencia sql
			$sql = "INSERT INTO maestros (nombreMaestro,carrera,email,password,foto) VALUES (?,?,?,?,?)";

			// Se pasa la consulta como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);				
				
			// Se ejecuta la sentencia. Si se ejecuta con éxito retorna true, caso contrario false
			if($stmt->execute([$name,$career,$email,$password,$foto])){ return true; }
			else { return false; }
		}

		//metodo para obtener los datos de un tutor especifico
		function infoTutorModel($id){
			$sql = "SELECT * FROM maestros WHERE id = ?";
			$stmt = connection::conectar()->prepare($sql);

			$stmt -> execute(array($id));

			$r = $stmt->fetch();

			return $r;
		}

		function updateTeacherModel($nombre,$paterno,$materno,$carrera,$password,$id){
			$sql = "SELECT * FROM maestros WHERE id = ?";
			$stmt = connection::conectar()->prepare($sql);
			$stmt -> execute(array($id));
			$user = $stmt->fetch();

			$sql = "UPDATE maestros SET nombreMaestro = ?, paterno = ?, materno = ?, carrera = ?, password = ? WHERE id = ?";
			$stmt = connection::conectar()->prepare($sql);

			if($stmt->execute(array($nombre,$paterno,$materno,$carrera,$password,$id))){
				$sql = "UPDATE usuarios SET nombre = ?, password = ? WHERE email=?";
				$stmt = connection::conectar()->prepare($sql);
				if($stmt->execute(array($nombre." ".$paterno." ".$materno,$password,$user['email']))){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}


		#ALUMNOS-------------------------------------------------------
			#--------------------------------------------
		// Método para agregar alumnos
		function addStudentModel($nombre, $paterno,$materno,$carrera, $maestro){
			//Sentencia sql
			$sql = "INSERT INTO alumnos (nombre,paterno,materno,carrera,maestro) VALUES (?,?,?,?,?)";

			// Se pasa la sentencia como parámetro del método prepare
			$stmt = connection::conectar()->prepare($sql);

			// Se ejecuta la sentencia. Si se ejecuta con éxito retorna true, caso contrario false
			if($stmt->execute([$nombre, $paterno, $materno,$carrera, $maestro])){ return true; }
			else { return false; }
		}

		//metodo para obtener los datos de un alumno especifico
		function InfoStudentModel($id){
			$sql = "SELECT * FROM alumnos WHERE id = ?";
			$stmt = connection::conectar()->prepare($sql);

			$stmt -> execute(array($id));

			$r = $stmt->fetch();

			return $r;
		}

		//metodo para eliminar un alumno
		function deleteStudentModel($id){
			$sql = "DELETE FROM alumnos WHERE id = ?";
			$stmt = connection::conectar()->prepare($sql);

			if($stmt->execute(array($id))){
				return true;
			}else{
				return false;
			}
		}
		
		//metodo para actualizar los datos de un alumno
		function updateStudentModel($nombre,$paterno,$materno,$carrera,$maestro,$id){
			$sql="UPDATE alumnos SET nombre = ?, paterno = ?, materno = ?, carrera = ?, maestro = ? WHERE id = ?";
			$stmt = connection::conectar()->prepare($sql);
			if($stmt->execute(array($nombre,$paterno,$materno,$carrera,$maestro,$id))){
				return true;
			}else{
				return false;
			}
		}

		#PROBLEMATICAS----------------------------------------------
		#---------------------------------------
		//metodo para agregar problematica
		function addProblemModel($nombre,$description){
			//sentencias sql
			$sql = "INSERT INTO problematica (nombre,descripcion) VALUES (?,?)";

			//se pasa la sentencia como parametro del metodo prepare
			$stmt = connection::conectar()->prepare($sql);

			//se ejectua la sentencia para realizar la insercion
			if($stmt->execute(array($nombre,$description))){
				return true;
			}else{
				return false;
			}
		}
	}// fin class datos

 ?>