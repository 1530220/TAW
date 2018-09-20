<?php  
	include_once('db/db_conection.php');
	session_start();

	$correo = $_SESSION['usuario'];
	//En caso de que se encuentre el correo se procedera a eliminar el registro en la base de datos.
	delete_user($correo);  //funcion para borrar un user activo

	header("location:cerrar_sesion.php"); //al borrar la cuenta se direcciona a cerrar_sesion.php

?>