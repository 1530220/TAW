<?php  
	//instancia del controlador a utilizar
	$controller = new MvcController();

	//guardar el id de la promocion a borrar
	$promocion = $_GET['id'];

	if($controller->deleteController($promocion,"promociones")==true){
		header("location:?action=verPromociones");
	}else{
		echo "<script>alert('No se puede eliminar la promocion')</script>";
	}
?>