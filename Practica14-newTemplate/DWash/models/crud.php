<?php  
	require_once "conexion.php";

	class Datos extends Conexion{
		//metodo para verificar si el usuario que desea iniciar sesion  esta registrado
		public function Iniciar_Sesion($usuario,$contraseña){
			//consulta en la tabla usuarios
			$sql = "SELECT * FROM usuarios WHERE nickname = ? and password = ?";
			//se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//se ejecuta la consulta
			$stmt->execute(array($usuario,$contraseña));
			$r = $stmt->fetch();

			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para realizar la consulta a una tabla y retornar todo lo que contiene la tabla
		public function getAllModel($table){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta
			$sql = "SELECT * FROM $table";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute();
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetchAll();
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para consultar la tabla usuarios pero solo devolver los registros que corresponde a un cliente
		public function getClientesModel(){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta
			$sql = "SELECT * FROM usuarios WHERE tipo = 'cliente'";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute();
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetchAll();
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para realizar el registro o la insercion en la tabla de usuarios para añadir un cliente
		public function agregarClienteModel($datos){
			//sentencia sql para realizar la insercion a la tabla usuarios, a fin de registrar un cliente
			$sql = "INSERT INTO usuarios (nombre,paterno,materno,email,nickname,password,tipo,puntos) VALUES(?,?,?,?,?,?,?,?)";
			//preparar la sentencia sql (insert) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el insert exitosamente
			if($stmt->execute(array($datos['nombre'],$datos['paterno'],$datos['materno'],$datos['email'],$datos['usuario'],$datos['contraseña'],"cliente",0))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para realizar el registro o la insercion en la tabla de premios para añadir un premio
		public function agregarPremioModel($datos){
			//sentencia sql para realizar la insercion a la tabla premios, a fin de registrar un premio
			$sql = "INSERT INTO premios(nombre,descripcion,puntos) VALUES(?,?,?)";
			//preparar la sentencia sql (insert) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el insert exitosamente
			if($stmt->execute(array($datos['nombre'],$datos['descripcion'],$datos['puntos']))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para realizar el registro o la insercion en la tabla de promociones para añadir una promocion
		public function agregarPromocionModel($datos){
			//sentencia sql para realizar la insercion a la tabla promociones, a fin de registrar una promocion
			$sql = "INSERT INTO promociones(nombre,descripcion) VALUES(?,?)";
			//preparar la sentencia sql (insert) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el insert exitosamente
			if($stmt->execute(array($datos['nombre'],$datos['descripcion']))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para realizar un registro en la tabla visitas
		public function marcarAsistenciaModel($id){
			//sentencia sql para realizar la insercion a la tabla visitas, a fin de registrar una visita
			$sql = "INSERT INTO visitas (idUsuario,fecha,hora) VALUES (?,CURDATE(),CURTIME())";
			//preparar la sentencia sql (insert) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el insert exitosamente
			if($stmt->execute(array($id))){
				return true;
			}else{
				return false;
			}	
		}

		//metodo para realizar la actualizacion del puntaje de un cliente debido a que se ha marcado una asistenica
		public function updatePuntosModel($cliente,$puntos){
			//sentencia sql para realizar el update de un registro de la tabla usuarios, al usuario q sea un cliente con el id ingresado por parametro
			$sql="UPDATE usuarios SET puntos = ? WHERE id = ?";
			//preparar la sentencia sql (insert) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el insert exitosamente
			if($stmt->execute(array($puntos,$cliente))){
				return true;
			}else{
				return false;
			}		
		}

		//metodo para obtener los datos de un cliente en especifico, el parametro de entrada es el id del cliente
		public function getClienteIdModel($id){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta
			$sql = "SELECT * FROM usuarios WHERE id = ?";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute(array($id));
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetch();
			if($r){
				return $r;
			}else{
				return [];
			}			
		}

		//metodo para obtener los datos de un premio en especifico, el parametro de entrada es el id del premio
		public function getPremioIdModel($id){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta
			$sql = "SELECT * FROM premios WHERE id = ?";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute(array($id));
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetch();
			if($r){
				return $r;
			}else{
				return [];
			}			
		}

		//metodo para obtener los datos de una promocion en especifico, el parametro de entrada es el id de promocion
		public function getPromocionIdModel($id){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta
			$sql = "SELECT * FROM promociones WHERE id = ?";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute(array($id));
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetch();
			if($r){
				return $r;
			}else{
				return [];
			}			
		}

		//metodo para obtener los datos del horario
		public function getHorarioIdModel($id){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta
			$sql = "SELECT * FROM horario WHERE id = ?";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute(array($id));
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetch();
			if($r){
				return $r;
			}else{
				return [];
			}			
		}

		//metodo para realizar el update o la actualizacion en la tabla de usuarios para un cliente
		public function editarClienteModel($datos,$id){
			//sentencia sql para realizar la actualizacion a la tabla usuarios, un cliente
			$sql = "UPDATE usuarios SET nombre = ?, paterno = ?, materno = ?, email = ?, password = ? WHERE id = ?";
			//preparar la sentencia sql (update) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el update exitosamente
			if($stmt->execute(array($datos['nombre'],$datos['paterno'],$datos['materno'],$datos['email'],$datos['contraseña'],$id))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para eliminar un registro deacuerdo al id que le llega al metodo, asi como el nombre de la tabla a afectar
		public function deleteModel($id,$table){
			//sentencia sql para realizar el delete de un registro
			$sql = "DELETE FROM $table WHERE id = ?";
			//preparar la sentencia sql (delete) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el delete exitosamente
			if($stmt->execute(array($id))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para realizar el update o la actualizacion en la tabla de premios
		public function editarPremioModel($datos,$id){
			//sentencia sql para realizar la actualizacion a la tabla usuarios, un cliente
			$sql = "UPDATE premios SET nombre = ?, descripcion = ?, puntos = ? WHERE id = ?";
			//preparar la sentencia sql (update) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el update exitosamente
			if($stmt->execute(array($datos['nombre'],$datos['descripcion'],$datos['puntos'],$id))){
				return true;
			}else{
				return false;
			}
		}	

		//metodo para realizar el update o la actualizacion en la tabla de promociones
		public function editarPromocionModel($datos,$id){
			//sentencia sql para realizar la actualizacion a la tabla usuarios, un cliente
			$sql = "UPDATE promociones SET nombre = ?, descripcion = ? WHERE id = ?";
			//preparar la sentencia sql (update) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el update exitosamente
			if($stmt->execute(array($datos['nombre'],$datos['descripcion'],$id))){
				return true;
			}else{
				return false;
			}
		}	

		//metodo para realizar el update del horario
		public function editarHorarioModel($horario,$id){
			//sentencia sql para realizar la actualizacion a la tabla horario
			$sql = "UPDATE horario SET descripcion = ? WHERE id = ?";
			//preparar la sentencia sql (update) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el update exitosamente
			if($stmt->execute(array($horario,$id))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para obtener las visitas de un cliente
		public function getVisitasModel($id){
			//sentencia sql en donde se especifica lo que se debe realizar, en este caso una consulta de las visitas de un cliente
			$sql = "SELECT * FROM visitas WHERE idUsuario = ?";
			//preparar la sentencia sql para despues proceder a ejecutarla
			$stmt = Conexion::conectar()->prepare($sql);
			//ejecutar la sentencia sql
			$stmt->execute(array($id));
			//asociar los registros que se obtienen de la consulta
			$r = $stmt->fetchAll();
			if($r){
				return $r;
			}else{
				return [];
			}			
		}

		//metodo para realizar el update del campo password en la tabla de usuarios, para un cliente
		public function cambiarContraseñaModel($password,$id){
			//sentencia sql para realizar la actualizacion a la tabla usuarios, campo password
			$sql = "UPDATE usuarios SET password = ? WHERE id = ?";
			//preparar la sentencia sql (update) en la conecion
			$stmt = Conexion::conectar()->prepare($sql);
			//condicion para verificar si se ha ejecutado el update exitosamente
			if($stmt->execute(array($password,$id))){
				return true;
			}else{
				return false;
			}	
		}
	}
?>