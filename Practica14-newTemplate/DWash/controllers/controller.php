<?php  
	class MvcController{
		public function plantilla(){
			include "views/plantilla.php";
		}

		//metodo para cambiar de vista
		public function enlacesPaginasController(){
			//trabajar con los enlaces de las paginas
			//validar si la variable "action" viene vacia, es decir, cuando se abre la pagina por primera vez, se debe cargar la vista index.php

			if (isset($_GET['action'])) {
				$enlacesController = $_GET['action'];
			}else{
				//si viene vacio inicializo con index
				$enlacesController = "index";
			}

			$respuesta = new Enlaces();
			include $respuesta->enlacesPaginasModel($enlacesController);
		}

		//metodo para iniciar sesion
		public function login(){
			if(isset($_POST['usuario'])&&isset($_POST['contraseña'])){
				//se guardan en variables los datos ingresados y recibido por el metodo post
				$usuario = $_POST['usuario'];
				$contraseña = $_POST['contraseña'];

				//instancia del modelo 
				$log = new Datos();
				//se guarda en $r los datos del usuario que inicio sesion
				$r = $log->Iniciar_Sesion($usuario,$contraseña);
				if($r){
					//se crean variables de sesion
					$_SESSION['usuario'] = $r['nickname'];
					$_SESSION['contraseña'] = $r['password'];
					$_SESSION['id'] = $r['id'];
					$_SESSION['tipo'] = $r['tipo'];
					header("location:DWash/index.php?action=inicio");
					//header("location:plantilla.php");
				}else{
					//sino se manda una alerta indicando usuario o contraseña incorrecta
					echo "<script>alert('Usuario o contraseña incorrecta.')</script>";
				}
			}
		}

		//metodo para obtener todos los registros de una tabla, nombre de la tabla es el parametro de entrada
		public function getAllController($table){
			//instancia del modelo datos
			$datos = new Datos();
			//retornar todos los valores que se consulten en el metodo 
			return $datos->getAllModel($table);
		}

		//metodo para obtener todos los clientes que se encuentran registrados en el sistema
		public function getClientesController(){
			//instancia del modelo datos
			$datos = new Datos();
			//retornar todos los valores que se consulten en el metodo
			return $datos->getClientesModel();
		}

		//metodo para registrar un cliente 
		public function agregarClienteController(){
			//se declara un arreglo que contendra las variables enviadas por el metodo post del formulario para registrar un cliente
			$cliente = array("nombre"=>$_POST['nombre'],
							"paterno"=>$_POST['paterno'],
							"materno"=>$_POST['materno'],
							"email"=>$_POST['email'],
							"usuario"=>$_POST['usuario'],
							"contraseña"=>$_POST['contraseña']);
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se registro el cliente
			if($datos->agregarClienteModel($cliente)==true){
				echo "<script>alert('Se ha registrado un cliente exitosamente')</script>";
			}else{
				echo "<script>alert('No se ha podido registrar un cliente')</script>";
			}
		}

		//metodo para agregar o registrar un nuevo premio
		public function agregarPremioController(){
			//se declara un arreglo que contendra las variables enviadas por el metodo post del formulario para registrar un premio
			$premio = array("nombre"=>$_POST['nombre'],
							"descripcion"=>$_POST['descripcion'],
							"puntos"=>$_POST['puntos']);
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se registro el premio
			if($datos->agregarPremioModel($premio)==true){
				echo "<script>alert('Se ha registrado un premio exitosamente')</script>";
			}else{
				echo "<script>alert('No se ha podido registrar un premio')</script>";
			}
		}

		//metodo para agregar o registrar una nueva promocion
		public function agregarPromocionController(){
			//se declara un arreglo que contendra las variables enviadas por el metodo post del formulario para registrar una promocion
			$promocion = array("nombre"=>$_POST['nombre'],
							"descripcion"=>$_POST['descripcion']);
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se registro la promocion
			if($datos->agregarPromocionModel($promocion)==true){
				echo "<script>alert('Se ha registrado una promocion exitosamente')</script>";
			}else{
				echo "<script>alert('No se ha podido registrar una promocion')</script>";
			}
		}

		//metodo para mandar una actualizacion al puntaje de un cliente
		public function aumentarPuntosController($cliente,$puntos){
			$datos = new Datos();

			if($datos->marcarAsistenciaModel($cliente)==true){
				if($datos->updatePuntosModel($cliente,$puntos)==true){
					echo "<script>alert('Asistencia marcada exitosamente')</script>";
					header("location:?action=verVisitas");
				}else{
					echo "<script>alert('No se ha aumentado el puntaje')</script>";	
				}
			}else{
				echo "<script>alert('No se ha añadido la asistencia')</script>";
			}
		}

		//metodo para verificar si un cliente puede adquirir un premio con los puntos que posee
		public function verificarPremioController(){
			//guardar el id del cliente
			$cliente = $_POST['cliente'];
			//guardar el id del premio
			$premio = $_POST['premio'];

			//instancia del model a utilizar
			$datos = new Datos();

			$datos_cliente = $datos->getClienteIdModel($cliente);
			$datos_premio = $datos->getPremioIdModel($premio);

			if($datos_cliente['puntos']>=$datos_premio['puntos']){
				$puntosRestantes = $datos_cliente['puntos'] - $datos_premio['puntos'];
				$datos->updatePuntosModel($cliente,$puntosRestantes);
				echo "<script>alert('El cliente ha obtenido el premio. Han disminuido sus puntos')</script>";	
			}else{
				echo "<script>alert('El cliente seleccionado no posee la cantidad suficiente de puntos para reclamar el premio')</script>";	
			}
		}

		//metodo para obtener el registro de un cliente especifico deacuerdo a su id
		public function getClienteIdController($id){
			$datos = new Datos();
			//retornar el registro que devuelve el modelo
			return $datos->getClienteIdModel($id);
		}

		//metodo para obtener el registro de un premio especifico deacuerdo a su id
		public function getPremioIdController($id){
			$datos = new Datos();
			//retornar el registro que devuelve el modelo
			return $datos->getPremioIdModel($id);
		}

		//metodo para obtener el registro de una promocion especifico deacuerdo a su id
		public function getPromocionIdController($id){
			$datos = new Datos();
			//retornar el registro que devuelve el modelo
			return $datos->getPromocionIdModel($id);
		}

		//metodo para obtener el registro del horario
		public function getHorarioIdController($id){
			$datos = new Datos();
			//retornar el registro que devuelve el modelo
			return $datos->getHorarioIdModel($id);
		}

		//metodo para actualizar un cliente 
		public function editarClienteController($id){
			//se declara un arreglo que contendra las variables enviadas por el metodo post del formulario para registrar un cliente
			$cliente = array("nombre"=>$_POST['nombre'],
							"paterno"=>$_POST['paterno'],
							"materno"=>$_POST['materno'],
							"email"=>$_POST['email'],
							"contraseña"=>$_POST['contraseña']);
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se registro el cliente
			if($datos->editarClienteModel($cliente,$id)==true){
				echo "<script>alert('Se ha actualizado un cliente exitosamente')</script>";
				header("location: ?action=verClientes&cambio=success");
			}else{
				echo "<script>alert('No se ha podido editar un cliente')</script>";
			}
		}

		//metodo para eliminar un registro en especifico, el cual es mandado como parametro de entrada al metodo, asi como el nombre de la tabla de la base de datos a afectar
		public function deleteController($id,$table){
			$datos = new Datos();
			return $datos->deleteModel($id,$table);
		}

		//metodo para editar un premio
		public function editarPremioController($id){
			//se declara un arreglo que contendra las variables enviadas por el metodo post del formulario para registrar un premio
			$premio = array("nombre"=>$_POST['nombre'],
							"descripcion"=>$_POST['descripcion'],
							"puntos"=>$_POST['puntos']);
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se registro el premio
			if($datos->editarPremioModel($premio,$id)==true){
				echo "<script>alert('Se ha actualizado el premio exitosamente')</script>";
				header("location: ?action=verPremios&cambio=success");
			}else{
				echo "<script>alert('No se ha podido actualizar el premio')</script>";
			}
		}

		//metodo para actualizar una nueva promocion
		public function editarPromocionController($id){
			//se declara un arreglo que contendra las variables enviadas por el metodo post del formulario para registrar una promocion
			$promocion = array("nombre"=>$_POST['nombre'],
							"descripcion"=>$_POST['descripcion']);
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se registro la promocion
			if($datos->editarPromocionModel($promocion,$id)==true){
				echo "<script>alert('Se ha actualizado la promocion exitosamente')</script>";
				header("location: ?action=verPromociones&cambio=success");
			}else{
				echo "<script>alert('No se ha podido actualizar la promocion')</script>";
			}
		}

		//metodo para actualizar el horario
		public function editarHorarioController($id){
			//se guarda en una variable el horario que es enviado por el metodo post
			$horario = $_POST['horario'];
			//se instancia el modelo a utilizar
			$datos = new Datos();
			//condicion para saber si se edito el horario
			if($datos->editarHorarioModel($horario,$id)==true){
				echo "<script>alert('Se ha actualizado el horario exitosamente')</script>";
				header("location: ?action=inicio&cambio=horario");
			}else{
				echo "<script>alert('No se ha podido actualizar el horario')</script>";
			}
		}

		//metodo para obtener las visitas de un cliente
		public function getVisitasController($id){
			$datos = new Datos();
			return $datos->getVisitasModel($id);
		}

		//metodo para editar la contraseña de un cliente, parametro de entrada, el id del cliente
		public function cambiarContraseñaController($id){
			$datos = new Datos();
			$password = $_POST['password'];
			if($datos->cambiarContraseñaModel($password,$id)==true){
				header("location:?action=inicio&cambio=password");
			}else{
				echo "<script>alert('No se ha podido cambiar tu contraseña')</script>";
			}
		}
	}
?>