<?php  
	class Conection{
		public function conectar(){
			$pdo = new PDO("mysql:host=localhost;dbname=practica10","root","");
			return $pdo;
		}
	}
?>