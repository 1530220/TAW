<?php  
	//clase conexion que tiene el pdo a utilizar
	class Conexion{
		public function conectar(){
			//host: localhost
			//dbname : nombre de la base de datos
			$pdo = new PDO("mysql:host=localhost;dbname=practica14","root","");
			//se retorna el pdo
			return $pdo;
		}
	}
?>