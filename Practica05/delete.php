<?php
	include_once('db/db_conection.php');

	//En caso de que se encuentre el id al llamar esta funcion se disparara el evento de eliminar el registro en la base de datos.
	if(isset($_GET['id']) && isset($_GET['t'])){
		$t = $_GET['t'];
		delete($_GET['id']);
		header("location: listado.php?t=".$t);
	}

?>