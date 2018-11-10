<?php  
	//controlador a utilizar
	$controller = new MvcController();
	//almacenar en una variable el id del cliente que llega mediante el metodo get
	$idCliente = $_GET['cliente'];
	//aumentar en 10 la cantidad de puntos que posee un cliente la cual llega por el metodo get
	$puntos = $_GET['point'] + 10;
	//funcion del controlador para actualizar el puntaje
	$controller->aumentarPuntosController($idCliente,$puntos);
?>