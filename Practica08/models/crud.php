<?php  
	//se requiere el archivo conexion que contiene el pdo
	require_once "conexion.php";

	//se heredan los metodo de la clase conexion
	class Datos extends Conexion{

		//metodo para verificar el usuario
		public function verificarUsuario($user){
			//preparar la consulta
			$stmt = Conexion::conectar()->prepare("SELECT * FROM users WHERE usuario = ?");
			//ejecutar la consultar 
			$stmt->execute(array($user));
			$r = $stmt->fetchAll();

			if($r){
				//se retorna 1 si no se encuentra un usuario con el parametro $user
				//esto ayuda a validar que no existan nicknames iguales en el sistema
				return 1;
			}else{
				//sino retorn 2
				return 2;
			}
		}

		//metodo para verificar la contraseña
		//parametro: usuario
		public function verificarPassword($user){
			//preparar consulta
			$stmt = Conexion::conectar()->prepare("SELECT * FROM users WHERE usuario=?");
			//ejecutar consulta
			$stmt->execute(array($user));
			//asociar valores devueltos en $r
			$r = $stmt->fetch();

			if($r){
				//si retorna un registro la consulta, retorna la contraseña
				return $r['password'];
			}else{
				return [];
			}
		}

		//metodo para registrar un usuario
		//parametros: arreglo datos, y nombre de la tabla de la base de datos
		public function registroUsuarioModel($datos,$tabla){
			//se prepara el insert
			$registrar = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario,password,email) 
				VALUES (:usuario,:password,:email)");
			//se manda como parametro el usuario contenido en el arreglo 
			$registrar->bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
			//se manda como parametro el password contenido en el arreglo 
			$registrar->bindParam(":password",$datos['password'],PDO::PARAM_STR);
			//se manda como parametro el email contenido en el arreglo 
			$registrar->bindParam(":email",$datos['email'],PDO::PARAM_STR);
			
			if($registrar->execute()){//se ejecuta el insert 
				//retorn success en caso de exito
				return "success";
			}else{
				//sino return error
				return "error";
			}
			$registrar->close();
		}

		//metodo para el login del usuario
		//parametro: arreglo con el usuario y la contraseña
		public function ingresoUsuarioModel($datos){
			//se prepara la consulta
			$ingresar = Conexion::conectar()->prepare("SELECT * FROM users WHERE usuario = :usuario and password = :password");
			//se manda el usuario como parametro, contenido en el arreglo
			$ingresar->bindParam(":usuario",$datos['usuario'],PDO::PARAM_STR);
			//se manda el password como parametro, contenido en el arreglo
			$ingresar->bindParam(":password",$datos['password'],PDO::PARAM_STR);
			//se ejecuta la consulta
			$ingresar->execute();

			//se asocian los valores devuelos
			$r = $ingresar->fetchAll();
			if($r){
				//si se encontro algo, retorna 1 lo que significa que si ingreso un usuario con su contraseña
				return 1;
			}else{
				//return 2 en caso contrario
				return 2;
			}
			$ingresar->close();
		}

		//metodo para consultar todos los registro de la tabla  users de la base de datos
		public function verUsuarios(){
			//preparar la consulta
			$stmt = Conexion::conectar()->prepare("SELECT * FROM users");
			//ejecutar la consulta
			$stmt->execute();
			//asociar valores devueltos
			$r = $stmt->fetchAll();

			if($r){
				//si encuentra algo retorna todos los valores asociados en $r
				return $r;
			}else{
				return [];
			}
		}

		//metodo para consultar informacion de un usuario 
		//parametro: id del usuario
		public function consultarInfoUsuarioModel($id){
			//se prepara la consulta
			$stmt = Conexion::conectar()->prepare("SELECT * FROM users WHERE id=?");
			//se ejecuta la consulta enviando el $id como parametro
			$stmt->execute(array($id));
			//asocia el registro encontrado con el $id enviado
			$r = $stmt->fetch();
			if($r){
				//retorna el registro encontrado
				return $r;
			}else{
				return [];
			}
		}

		//metodo para actualizar los datos de un usuario
		//parametro: arreglo que contiene el password, email y id 
		public function actualizarUsuarioModel($datos){
			//se prepara el update
			$stmt = Conexion::conectar()->prepare("UPDATE users SET password = :password, email=:email WHERE id=:id");
			//se manda el parametro password contenido en el arreglo 
			$stmt->bindParam(":password",$datos['password'],PDO::PARAM_STR);
			//se manda el parametro email contenido en el arreglo 
			$stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
			//se manda el parametro id contenido en el arreglo 
			$stmt->bindParam(":id",$datos['id'],PDO::PARAM_STR);
			//se ejecuta el update
			if($stmt->execute()){
				return 1;//return 1 en caso de exito al actualizar
			}else{
				//return 2 en caso de no poder actualizar
				return 2;
			}
		}
		
		//metodo para eliminar un usuario
		//parametro: usuario a eliminar
		public function eliminarUsuarioModel($user){
			//se prepara el delete
			$stmt = Conexion::conectar()->prepare("DELETE FROM users WHERE usuario=?");
			//se ejecuta el delete mandando el usuario a eliminar
			if($stmt->execute(array($user))){
				return 1;//return 1 en caso de exito al eliminar
			}else{
				return 2;//return 2 en caso de fallar al eliminar
			}
		}
	}
?>