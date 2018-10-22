<?php 	
	
	/**
	 * Clase conexion, Tiene el método conectar para conectarse a la bd
	 */
	class connection
	{	

		// Se declaran las variables miembro de la clase como privadas
		//private $link;
		//private $user;
		//private $password;			

		function conectar(){			
			//$this->link = "mysql:host=localhost;dbname=practica10"; // se guarda el tipo de bd y el nombre de la bd
			//$this->user = "root"; // nombre de usuario
			//$this->password = ""; // Contraseña

			// Se declara un objeto del tipo PDO y se le pasan como parámetros las tres variables antes usadas
			$pdo = new PDO("mysql:host=localhost;dbname=practica10", "root", "");

			// Se establce el encoding utf8
			$pdo->exec("SET CHARACTER SET utf8");

			// Se retorna el objeto PDO
			return $pdo;
		}
	}


 ?>