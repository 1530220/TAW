<?php  
	
	// como se redirecciona a este archivo y NO SE INCLUYE se debe poner la función session_sstart()
	session_start();

	// Se destruye la sesion en caso de existir (que siempre va a existir si se llega a este paso XD)
	if($_SESSION){
		session_destroy();

		// después de destruir la sesión se redirecciona al index (al inicio, donde todo comenzó, al login)
		header("location:../index.php");
	}
?>