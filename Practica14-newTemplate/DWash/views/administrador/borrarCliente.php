<?php  
	//instancia del controlador a utilizar
	$controller = new MvcController();

	//guardar el id del cliente a borrar
	$cliente = $_GET['id'];

	if($controller->deleteController($cliente,"usuarios")==true){
		header("location:?action=verClientes");
	}else{
		echo "<script>alert('No se puede eliminar el cliente')</script>";
	}
?>