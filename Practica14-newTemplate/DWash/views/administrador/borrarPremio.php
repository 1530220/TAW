<?php  
	//instancia del controlador a utilizar
	$controller = new MvcController();

	//guardar el id del premio a borrar
	$premio = $_GET['id'];

	if($controller->deleteController($premio,"premios")==true){
		header("location:?action=verPremios");
	}else{
		echo "<script>alert('No se puede eliminar el premio')</script>";
	}
?>