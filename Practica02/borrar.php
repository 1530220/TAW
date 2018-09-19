<?php  
	include "conexion.php";

	if($_GET){
		$id = $_GET['id'];

		$consulta_delete = "DELETE FROM persona WHERE id = ?";
		$delete_persona = $pdo->prepare($consulta_delete);
		$delete_persona->execute(array($id));

		echo "Persona eliminada";

		header("location:ver.php");
	}
?>