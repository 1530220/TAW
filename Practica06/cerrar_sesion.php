<?php  
	session_start();  //iniciar sesiones
	session_destroy();	//destruir la sesion iniciada
	header("location: index.php");  //redirecionar al login
?>