<?php  
	//el index que muestra al usuario la salida de las vistas y a travez de el enviaremos las diferentes acciones del usuario al controlador

	//mostrar la plantilla al usuario (template.php) alojada en views

	require_once "controllers/controller.php";

	//invocamos el modelo que se utilizara en todos los archivos

	require_once "models/model.php";

	require_once "models/crud.php";
	//para poder ver el template o plantilla se hace una peticion mediante a un controlador

	//Se crea el objeto

	$mvc = new MvcController();

	//muestra la funcion "plantilla" que se encuentra en controllers/controller

	$mvc->plantilla();
?>