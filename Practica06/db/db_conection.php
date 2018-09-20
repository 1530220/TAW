<?php  
	include "db_credenciales.php";

	
	//especificar host, en este caso es local, y el nombre de la base de datos
	$link = "mysql:host=".db_host.";dbname=".db_database;  

	try {
		$conn = new PDO($link,db_user,db_pass); //crear una instacia que sera la conexion con la clase PDO
	} catch (PDOException $e) {
		//imprimir mensaje de error en caso de que ocurra algun problema al instancias la clase PDO
		print "Error".$e->getMessage()."<br>";
		die();
	}


	//Funcion que permite agregar un nuevo usuario a la base de datos, requiere nombre y correo.
	function add($id,$nombre,$posicion,$carrera,$correo,$id_type){
		//pdo
		global $conn;
		//sentencia para insertar
		$sql = "INSERT INTO sport_team (id,nombre,posicion,carrera,email,id_type) VALUES (?,?,?,?,?,?)";
		//preparar sentencia
		$insert = $conn->prepare($sql);
		//executar con los parametros que tiene la funcion de entrada
		$insert ->execute(array($id,$nombre,$posicion,$carrera,$correo,$id_type));
	}

	/*Funcion que permite actualizar los atributos de un usuario existente, requiere nombre, posicion, carrera, correo y su id.*/
	function update($id,$nombre,$posicion,$carrera,$correo,$id_type){
		//pdo
		global $conn;
		//sentencia para actualizar
		$sql = "UPDATE sport_team SET nombre=?, posicion=?, carrera=?, email=? where id=? and id_type=?";
		//preparar sentencia
		$update = $conn->prepare($sql);
		//ejecutar la actualizacion
		$update ->execute(array($nombre,$posicion,$carrera,$correo,$id,$id_type));
	}

	//Funcion que permite eliminar un registro de la tabla sport_team de la base de datos utilizando su id.
	function delete($id){
		//pdo
		global $conn;
		//sentencia para borrar un registro
		$sql = "DELETE FROM sport_team where id=?";
		//preparar sentencia
		$delete = $conn->prepare($sql);
		//ejecutar borrado
		$delete ->execute(array($id));
	}

	//Funcion que permite obtener los registros encontrados en la tabla sport_team de la base de datos.
	//tiene como parametro de entrada el id_type
	function getAll($t){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT * FROM sport_team WHERE id_type='.$t;
		//preparar consulta
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los registros que devuelve la consulta
		$r = $select->fetchAll(); 

		if($r)
			return $r;
		return [];
		
	}

	//Funcion que permite realizar una busqueda de un usuario para obtener todos sus atributos mediante su id.
	function search($id,$t){
		//pdo
		global $conn;
		//consulta
		$sql = "SELECT * FROM sport_team where id=? and id_type=?";
		//preparar consulta
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute(array($id,$t));
		//asociar registros obtenidos con la consulta
		$r = $select->fetch(); 

		if($r)
			return $r;
		return [];
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Funcion que permite contar todos los registros encontrados en la tabla status de la base de datos.
	function count_status(){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT COUNT(*) as total_status FROM status'; 
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 
		//valor de retorno
		return $r[0]['total_status']; 
		
	}

	//Funcion que permite contar todos los registros encontrados en la tabla user de la base de datos.
	function count_users(){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT COUNT(*) as total_user FROM user';
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 
		//valor de retorno
		return $r[0]['total_user'];	
	}

	//Funcion que permite contar todos los registros encontrados en la tabla user log  de la base de datos.
	function count_access(){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT COUNT(*) as total_access FROM user_log';
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 
		//valor de retorno
		return $r[0]['total_access'];	
	}

	//Funcion que permite contar todos los registros encontrados en la tabla user type de la base de datos.
	function count_types(){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT COUNT(*) as total_types FROM user_type';
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 
		//valor de retorno
		return $r[0]['total_types'];
	}

	//Funcion que permite contar todos los registros encontrados en la tabla user que sean activos
	function count_active(){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT COUNT(*) as total_actives FROM user WHERE status_id=1';
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 
		//valor de retorno
		return $r[0]['total_actives'];
	}

	//Funcion que permite contar todos los registros encontrados en la tabla user que sean inactivos
	function count_inactive(){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT COUNT(*) as total_inactives FROM user WHERE status_id=2';
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 
		//valor de retorno
		return $r[0]['total_inactives'];
	}

	//funcion para retornar los datos de una tabla en la base de datos
	//tiene como parametro el nombre de la tabla
	function selectAllFromTable($t){
		//pdo
		global $conn;
		//consulta
		$sql = 'SELECT * FROM '.$t; //$t contiene el nombre de la tabla, parametro de entrada en la funcion
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute();
		//asociar a $r los campos devueltos en la consulta
		$r = $select->fetchAll(); 

		//valor de retorno
		if($r){
			return $r;
		}else{
			return [];
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////


	/***************************************************************************************************/
	//function que me permite saber si un usuario existe o no para poder ingresar al inicio
	//los parametros de entrada son los datos del login, al iniciar sesion se pide correo y contraseña
	function consultar_user($correo,$contraseña){
		//pdo
		global $conn;
		//consulta buscando un usuario con su correo y contraseña;
		$sql = 'SELECT * FROM user WHERE email=? and password=?'; 
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute(array($correo,$contraseña));
		
		$r = $select ->fetchAll();

		if($r){
			return 1; //si existe retorna 1
		}else{
			return 2; //si no existe retorn 2
		}
	}

	//funcion para verificar que el correo con el que se qiere registrar un usuario no exista, porque se usara para el login
	function verificar_correo($correo){
		//pdo
		global $conn;
		//consulta buscando un usuario con su correo
		$sql = 'SELECT * FROM user WHERE email=?'; 
		//mandar consulta al pdo
		$select = $conn ->prepare($sql);
		//ejecutar consulta
		$select->execute(array($correo));
		
		$r = $select ->fetch();

		if($r){
			return $r; //si existe retorna $r
		}else{
			return 2; //si no existe retorn 2
		}
	}
	//funtion que me permite insertar un nuevo usuario en la tabla user 
	//los parametros de entrada son del formulario de registrar_user.php
	function registrar_user($correo,$password,$status,$type){
		//pdo
		global $conn;
		//sentencia para insertar en la tabla user
		$sql = 'INSERT INTO user(email,password,status_id,user_type_id) VALUES (?,?,?,?)'; 
		//mandar sentencia al pdo
		$insert = $conn ->prepare($sql);
		//ejecutar insert
		$insert->execute(array($correo,$password,$status,$type));
	}

	//funcion utilizada para actualizar los datos de un user
	//parametros de entrada son la contraseña, el estatus, y el tipo, asi como el email 
	//el email sera el indicador para saber que registro actualizar
	function update_user($correo,$password,$status,$type){
		//pdo
		global $conn;
		//sentencia para actualizar en la tabla user
		$sql = 'INSERT INTO user(password,status_id,user_type_id) VALUES (?,?,?) WHERE id = ?'; 
		//mandar sentencia al pdo
		$update = $conn ->prepare($sql);
		//ejecutar update
		$update->execute(array($password,$status,$type,$correo));
	}

	//funcion que me permite eliminar un usuario deacuerdo a su correo
	function delete_user($correo){
		//pdo
		global $conn;
		//sentencia para borrar un registro
		$sql = "DELETE FROM user where email=?";
		//preparar sentencia
		$delete = $conn->prepare($sql);
		//ejecutar borrado
		$delete ->execute(array($correo));		
	}

	//function que me permite guardar la fecha y el usuario que se accedio mediante el login
	function insert_log($fecha,$id){
		//pdo
		global $conn;
		//sentencia para insertar en la tabla user_log
		$sql = 'INSERT INTO user_log(date_logged_in,user_id) VALUES (?,?)'; 
		//mandar sentencia al pdo
		$insert = $conn ->prepare($sql);
		//ejecutar insert
		$insert->execute(array($fecha,$id));	
	}

	/***************************************************************************************************/	
?>