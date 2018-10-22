<?php 

	// Se manda llamar al archivo de conexión que contiene la clase connection con 
	// el método conectar
	require_once "connection.php";

	// Clase login extiende de la clase connection
	// Esta clase contiene el método iniciar_sesión para validar los datos ingresados en el form
	class Login extends connection{

		// Se pasa un array como parámetro el cual contiene el email y contraseña del usuario
		public function iniciar_sesion($datos){

			// Se pasa la consulta sql como parámetro del método prepare
			$stmt = connection::conectar()->prepare("SELECT * FROM usuarios WHERE email = ? and password = ?");

			// Se ejecuta la consulta pasándole como parámetros los valores de email y password del array
			$stmt->execute(array($datos['email'],$datos['contraseña']));

			// Se almacena en un array el registro encontrado
			$r = $stmt->fetch();

			// Si encontró el registro en la bd retorna el array con la clave "tipo"
			if($r){
				return $r['tipo'];
			}else{
				// Si no encontró registro retorna "fallo"
				return "fallo";
			}
		}
	}
?>