
<?php  
	//clase conection que tiene el metodo para crear la conexion a la base de datos
	class Conection{
		public function conexion(){
			//se crea la conexion por PDO indicando el host, nombre de la base de datos, usuario, contraseña
			$pdo = new PDO("mysql:host=localhost;dbname=practica09","root","");
			//retorna el objeto de la clase PDO
			return $pdo;
		}
	}
?>