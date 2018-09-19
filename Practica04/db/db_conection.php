<?php  
	include "database_credentials.php";
	
	//especificar host, en este caso es local, y el nombre de la base de datos
	$link = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE;  

	try {
		$conn = new PDO($link,DB_USER,DB_PASS); //crear una instacia que sera la conexion con la clase PDO
	} catch (PDOException $e) {
		//imprimir mensaje de error en caso de que ocurra algun problema al instancias la clase PDO
		print "Error".$e->getMessage()."<br>";
		die();
	}


	//Funcion que permite agregar un nuevo usuario a la base de datos, requiere nombre y correo.
	function add($nombre,$correo){
		global $conn;
		$sql = "INSERT INTO usuario (nombre,correo) VALUES (?,?)";

		$insert = $conn->prepare($sql);
		$insert ->execute(array($nombre,$correo));
	}

	//Funcion que permite actualizar los atributos de un usuario existente, requiere nombre, correo y su id.
	function update($id,$nombre,$correo){
		global $conn;
		$sql = "UPDATE usuario SET nombre=?, correo=? where id=?";
		
		$update = $conn->prepare($sql);
		$update ->execute(array($nombre,$correo,$id));
	}

	//Funcion que permite eliminar un usuario de la base de datos utilizando su id.
	function delete($id){
		global $conn;
		$sql = "DELETE FROM usuario where id=?";
		
		$delete = $conn->prepare($sql);
		$delete ->execute(array($id));
	}

	//Funcion que permite obtener todos los registros encontrados en la tabla usuarios de la base de datos.
	function get_all(){
		global $conn;
		$sql = 'SELECT * FROM usuario';

		$select = $conn ->prepare($sql);
		$select->execute();

		$r = $select->fetchAll(); 

		if($r)
			return $r;
		return [];
		
	}
/*
	function usuarios(){
		global $conn;
		$sql = 'SELECT * FROM usuario';

		$select = $conn ->prepare($sql);
		$select->execute();

		$r = $select->fetchAll(); 

		$i= 0;
		foreach ($resultados as $dato) {
			$i++;
		}
		return $i;
			
	}*/
	//Funcion que permite realizar una busqueda de un usuario para obtener todos sus atributos mediante su id.
	function search($id){
		global $conn;
		$sql = "SELECT * FROM usuario where id=?";

		$select = $conn ->prepare($sql);
		$select->execute(array($id));


		$r = $select->fetch(); 

		if($r)
			return $r;
		return [];
		
	}
?>