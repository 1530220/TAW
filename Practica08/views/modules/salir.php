
<?php  
	//header("location: index.php");
	session_destroy(); //destruir la session
	echo "<script>alert('Haz cerrado la sesion.')</script>";
	//mover al index del sistema
	header("location: index.php");
?>