<?php  
	//se requiere el archivo que contiene la conexion PDO
	require_once "conection.php";

	//clase que tiene heredada el metodo de la clase conexion que retorna el objeto pdo
	class Datos extends Conection{
		
		//metodo para realizar la consulta a las carreras
		public function carrerasModel(){
			//se prepara la consulta 
			$stmt = Conection::conexion()->prepare("SELECT * FROM carrera");
			//se ejecuta la consulta
			$stmt->execute();
			//asociar el $r los registros que retorne la consulta
			$r = $stmt->fetchAll();

			//si $r tiene un valor asociado se retorna $r
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para realizar la consulta a los tutores
		public function tutoresModel(){
			//se prepara la consulta 
			$stmt = Conection::conexion()->prepare("SELECT * FROM tutor");
			//se ejecuta la consulta
			$stmt->execute();
			//se asocia los registros que retorne la consulta en $r
			$r = $stmt->fetchAll();

			//si $r posee valores asociados se retorna 
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para consultar a los alumnos
		public function alumnosModel(){
			//se prepara la consulta
			$stmt = Conection::conexion()->prepare("SELECT * FROM alumno");
			//se ejectua la consulta
			$stmt->execute();
			//se asocia en $r los valores que retorna la consulta
			$r = $stmt->fetchAll();

			if($r){
				//si $r tiene registros se retorna
				return $r;
			}else{
				return [];
			}
		}

		//metodo para actualizar la imagen de un alumno determinado
		public function actualizarImagenModel($destino,$id){
			//se prepara la sentencia update
			$stmt = Conection::conexion()->prepare("UPDATE alumno SET imagen = :imagen WHERE matricula = :id");
			//se manda el valor imagen el cual es la ruta de la imagen
			$stmt->bindParam(":imagen",$destino,PDO::PARAM_STR);
			//se manda el parametro id que contiene el id de alumno a actualizar
			$stmt->bindParam(":id",$id,PDO::PARAM_STR);
			//se ejecuta la actualizacion
			$stmt->execute();
		}

		//metodo para registrar un alumno
		public function registrarAlumnoModel($datos,$destino){
			//se prepara el insert
			$stmt = Conection::conexion()->prepare("INSERT INTO alumno(nombre,carrera,situacion,email,tutor,imagen) VALUES (:nombre,:carrera,:situacion,:email,:tutor,:imagen)");
			//se manda el parametro nombre contenido en el arreglo datos
			$stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			//se manda el parametro carrera contenido en el arreglo datos
			$stmt->bindParam(":carrera",$datos['carrera'],PDO::PARAM_STR);
			//se manda el parametro situacion contenido en el arreglo datos
			$stmt->bindParam(":situacion",$datos['situacion'],PDO::PARAM_STR);
			//se manda el parametro email contenido en el arreglo datos
			$stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
			//se manda el parametro tutor contenido en el arreglo datos
			$stmt->bindParam(":tutor",$datos['tutor'],PDO::PARAM_STR);
			//se manda el parametro imagen contenido en la variable destino
			$stmt->bindParam(":imagen",$destino,PDO::PARAM_STR);
			if($stmt->execute()){
				//si el insert se ejecuta exitosamente se returna el valor 1
				return 1;
			}else{
				//sino retorna el valor 2
				return 2;
			}
		}

		//functio para mostrar datos de un alumno indicandolo por su id
		public function infoAlumnoModel($id){
			//se prepara la consulta
			$stmt = Conection::conexion()->prepare("SELECT * FROM alumno WHERE matricula = ?");
			//se ejecuta la consulta mandado el parametro del metodo, el id del alumno
			$stmt->execute(array($id));
			//asociar en $r el registro que devuelve la consulta
			$r = $stmt->fetch();

			if($r){
				//si $r tiene algo, retorna $r
				return $r;
			}else{
				return [];
			}
		}

		//metodo para eliminar un alumno indicado por el id
		public function eliminarAlumnoModel($id){
			//se prepara el delete
			$stmt = Conection::conexion()->prepare("DELETE FROM alumno WHERE matricula= ? ");
			//se ejecuta el detele mandando el id como parametro del delete
			$stmt->execute(array($id));
		}

		//metodo para editar un alumno 
		//parametro: arreglo datos que contiene los valores que seran ingresados en la modificacion
		public function editarAlumnoModel($datos){
			//se prepara el update
			$stmt = Conection::conexion()->prepare("UPDATE alumno SET nombre = :nombre, carrera = :carrera, situacion = :situacion, email = :email, tutor = :tutor WHERE matricula = :matricula");
			//se manda el parametro nombre contenido en el arreglo datos
			$stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
			//se manda el parametro carrera contenido en el arreglo datos
			$stmt->bindParam(":carrera",$datos['carrera'],PDO::PARAM_STR);
			//se manda el parametro situacion contenido en el arreglo datos
			$stmt->bindParam(":situacion",$datos['situacion'],PDO::PARAM_STR);
			//se manda el parametro email contenido en el arreglo datos
			$stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
			//se manda el parametro tutor contenido en el arreglo datos
			$stmt->bindParam(":tutor",$datos['tutor'],PDO::PARAM_STR);
			//se manda el parametro matricula contenido en el arreglo datos
			$stmt->bindParam(":matricula",$datos['matricula'],PDO::PARAM_STR);
			//se ejecuta el update
			if($stmt->execute()){
				//se retorna 1 en caso de que la actualizacion sea exitosa
				return 1;
			}else{
				//sino retorna 2
				return 2;
			}
		}
	}
?>