<?php  

	// Se incluyen los archivos del controlador y del modelo necesarios para la funcionalidad del sistema
	require_once "controllers/controller.php";
	require_once "models/enlaces.php";
	require_once "models/CRUD_administrator.php";
	require_once "models/login_Model.php";

	// Se crea un objeto del tipo MvcController
	$mvc = new MvcController();

	// Se manda llamar al método template
	$mvc->template();
?>