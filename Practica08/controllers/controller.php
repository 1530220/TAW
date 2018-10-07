<?php  


	class MvcController{
		//llamar a la plantilla

		public function plantilla(){
			// include se utiliza para invocar el archivo que contiene el codigo html
			include "views/template.php";
		}

		//interaccion con el usuario
		public function enlacesPaginasController(){
			//trabajar con los enlaces de las paginas
			//validar si la variable "action" viene vacia, es decir, cuando se abre la pagina por primera vez, se debe cargar la vista index.php

			if (isset($_GET['action'])) {
				//guardar el valor de la variable action en "views/modules/navegacion.php en el cual se recibe mediante GET esa variable"
				$enlacesController = $_GET['action'];
			}else{
				//si viene vacio inicializo con index
				$enlacesController = "index";
			}

			//mostrar los archivos de los enlaces de cada una de las secciones: inicio, nosotros, servicios, contactenos,etc.

			//PARA ESTO HAY QUE MANDAR AL MODELO PARA QUE HAGA DICHO PROCESO Y MUESTRE LA INFORMACION
			$respuesta = new EnlacesPaginas();
			//$respuesta = new EnlacesPaginas::enlacesPaginasModel($enlacesController);
			//$respuesta = $respuesta1->enlacesPaginasModel($enlacesController);
			include $respuesta->enlacesPaginasModel($enlacesController);
		}

		//function para registrar un usuario
		public function registroUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){ //se verifica que se haya llenado el campo de usuario

				//arreglo donde se almacena el usuario, contraseña y correo que ingreso ene le formulario
				$datosController = array("usuario"=>$_POST["usuarioRegistro"],"password"=>$_POST["passwordRegistro"],"email"=>$_POST["emailRegistro"]);

				//instancia del modelo datos
				$respuesta = new Datos();

				//se realiza el metodo para verificar que el usuario ingresado no exista, en mi sistema no permitire dos nickname iguales
				if($respuesta->verificarUsuario($_POST["usuarioRegistro"])==1){
					//se avisa por media de una alerta que el usuario ingresado esta en uso
					echo "<script>alert('Usuario en uso. Favor de ingresar otro usuario')</script>";
				}else{
					//si no existe el usuario ingresado se realiza el metodo registroUsuarioModel
					//parametros: los datos ingresados y el nombre de la tabla de la base de datos
					$r = $respuesta->registroUsuarioModel($datosController,"users");

					if($r =="success"){
						header("location:index.php?action=ok");
					}else{
						header("location:index.php");
					}
				}
			}
		}

		//funcion para ingresar un usuario (controlador del login)
		public function ingresarUsuarioController(){
			//se verifica que se haya ingresado usuario y contraseña
			if(isset($_POST["usuarioIngresar"]) && isset($_POST["passwordIngresar"])){

				//se almacena en un arreglo los datos
				$datosIngresar = array("usuario"=>$_POST["usuarioIngresar"],"password"=>$_POST["passwordIngresar"]);
				//se instancia el modelo Datos
				$respuesta = new Datos();
				//se verifica el motodo de ingresoUsuarioModel 
				//parametro: arreglo que posee el usuario y contraseña
				if($respuesta->ingresoUsuarioModel($datosIngresar)==1){
					//se manda el usuario ingresado si el metodo devuelve 1, qiere decir que si ingreso,
					//se guardae en la variable usuario de session
					$_SESSION['usuario']= $_POST['usuarioIngresar'];
					//se dirige a la pantalla de usuarios
					header("location:index.php?action=usuarios");
				}else{
					//se indica que fallo al ingresar
					header("location:index.php?action=fallo");
				}

			}
		}

		//metodo para ver los usuarios
		public function verUsuariosController(){
			//instancia del modelo Datos
			$respuesta = new Datos();
			//se retorna los datos que obtiene el model verUsuarios
			return $respuesta->verUsuarios();
		}

		//metodo para consultar los datos de un usuario
		public function consultarInfoUsuarioController($id){
			$id_info = new Datos();
			//se retorna los datos de consultarInfoUsuarioModel para que el usuario
			//vea los datos que tiene en el formulario de modificar
			return $id_info->consultarInfoUsuarioModel($id);
		}

		//metodo para guardar los nuevos datos que ingresa un usuario al modificar
		public function actualizarUsuarioController($id){
			//se verifica que no este en blanco el input de passsword y email
			if(isset($_POST['passwordModificar'])&&isset($_POST['emailModificar'])){
				//se guarda en un arreglo la contraseña, el email y el id del usuario
				$datosActualizar = array("password"=>$_POST['passwordModificar'],"email"=>$_POST['emailModificar'],"id"=>$id);
				//instancia del model Datos
				$actualizacion = new Datos();
				//se verifica si el metodo actualizarUsuarioModel se ha realizado
				//parametro: arreglo creado anteriormente
				if($actualizacion->actualizarUsuarioModel($datosActualizar)==1){
					//si se actualiza se procede a ver la lista de usuarios
					header("location:index.php?action=cambio");
				}else{
					//sino se le indica al usuario que no se actualizaron los datos
					echo "<script>alert('No se ha podido actualizar los datos')</script>";
				}
			}
		}

		//metodo para eliminar un usuario
		//parametro: el usuario a eliminar
		public function eliminarUsuarioController($user){
			//se verifica que se haya ingresado la contraseña para proceder a eliminar
			if(isset($_POST['passwordEliminar'])){
				//se intancia el model Datos
				$eliminar = new Datos();
				//se realiza el metodo verificarPassword que retorna la contraseña de usuario 
				//que se manda por parametro
				$contraseña_user = $eliminar->verificarPassword($user);
				//se verifica si la contraseña del usuario es igual a la ingresada en el formulario 
				// de eliminar
				if($contraseña_user == $_POST['passwordEliminar']){
					//se procede a eliminar el usuario que tiene como parametro
					if($eliminar->eliminarUsuarioModel($user)==1){
						//se verifica si el usuario eliminado es el usuario que inicio session
						if($user == $_SESSION['usuario']){
							//se destruye la session
							session_destroy();
							//se procede al registro y manda la variable eliminar
							header("location:index.php?eliminar=true");
						}else{
							//si no es el usuario en sesion se procede a ver la lista de usuarios
							header("location:index.php?action=cambio&delete_success=true");
						}
					}
				}else{
					//se le indica al usuario que la contraseña es incorrecta
					echo "<script>alert('Contraseña invalida.')</script>";
				}	
			}
		}
	}
?>