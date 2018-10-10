<?php  
	class MvcController{
		//llamar a la plantilla

		public function plantilla(){
			// include se utiliza para invocar el archivo que contiene el codigo html
			include "views/template.php";
		}

		public function enlacesPaginasController(){
			//trabajar con los enlaces de las paginas
			//validar si la variable "enlace" viene vacia
			if (isset($_GET['enlace'])) {
				//guardar el valor de la variable action en "views/modules/navegacion.php en el cual se recibe mediante GET esa variable"
				$enlacesController = $_GET['enlace'];
			}else{
				//si viene vacio inicializo con index
				$enlacesController = "index";
			}

			//PARA ESTO HAY QUE MANDAR AL MODELO PARA QUE HAGA DICHO PROCESO Y MUESTRE LA INFORMACION
			$respuesta = new Enlaces();
			include $respuesta->paginasModel($enlacesController);
		}

		//function para consultar las carreras por medio del modelo
		public function carrerasController(){
			//instancias la clase datos
			$carreras = new Datos();
			return $carreras->carrerasModel();
		}

		//function para consultar los tutores por medio del modelo
		public function tutorController(){
			//instanciar la clase datos
			$tutores = new Datos();
			return $tutores->tutoresModel();
		}

		//function para consultar las carreras por medio del modelo
		public function alumnosController(){
			//instanciar la clase datos
			$alumnos = new Datos();
			return $alumnos->alumnosModel();
		}

		//function para consultar los datos de un alumno por medio del modelo
		public function informacionAlumnoID($id){
			//instanciar la clase datos
			$alumno = new Datos();
			return $alumno->infoAlumnoModel($id);
		}

		//metodo para mandar a un modelo el id del alumno a eliminar
		public function eliminarAlumnoController($id){
			$eliminarAlumno = new Datos();
			//enviar el id como parametro en el modelo eliminarAlumnoModel
			$eliminarAlumno->eliminarAlumnoModel($id);
			//mostrar la vista de ver alumnos despues de eliminar alumno
			header("location:index.php?enlace=verAlumnos&eliminar=true");
		}

		//metodo para registrar un nuevo alumno
		public function registrarAlumnoController(){
			//se verifica que se hayan ingresado datos en el formulario para registrar un alumno
			if(isset($_POST['nombre'])&&isset($_POST['carrera'])&&isset($_POST['situacion'])&&isset($_POST['email'])&&isset($_POST['tutor'])){

				//arreglo para indicar las posibles extensiones de las imagenes que se admitiran
				$extensiones = array('image/jpg','image/jpeg','image/png');
				//indicar el tamaño maximo de la imagen que se permitira subir
				$max = 1024 * 1024 * 8;
				//variable para guardar la ruta temporal donde se almacena la imagen
				$ruta_origen = $_FILES['imagen']['tmp_name'];
				//variable para guardar la ruta que se desea tener para guardar la imagen
				$ruta_destino = 'media/pictures/'.rand(0, 99999999999).$_FILES['imagen']['name'];

				//se verifica que la imagen subida sea de extension indicada anteriormente, gracias a la variable type
				if(in_array($_FILES['imagen']['type'],$extensiones)){
					//se verifica que la imagen sea menor al tamañano maximo indicado
					if($_FILES['imagen']['size']<$max){
						//condicion para saber si se pudo subir la imagen a la ruta deseada
						if(move_uploaded_file($ruta_origen,$ruta_destino)){
							//guardar los datos en un arreglo, datos que se obtiene del metodo post del formulario para registrar un nuevo alumno
							$datos = array("nombre"=>$_POST['nombre'],"carrera"=>$_POST['carrera'],"situacion"=>$_POST['situacion'],"email"=>$_POST['email'],"tutor"=>$_POST['tutor'],"imagen"=>$ruta_destino);

							//instanciar la clase datos
							$registro = new Datos();
							//condicion para validar que el modelo haya realizado el registro
							if($registro->registrarAlumnoModel($datos,$ruta_destino)==1){
								//mostrar la vista ver alumnos indicando el registro exitoso
								header("location:index.php?enlace=verAlumnos&registro=true");
							}else{
								//mostrar un alerta para indicar que no se pudo realizar el registro
								echo "<script>alert('No se ha podido registrar el alumno')</script>";
							}
						}
					}else{
						//si la imagen es muy grande se indica al alumno
						echo "<script>alert('Error. Tamaño de la imagen excedido')</script>";
					}
				}else{
					echo "<script>alert('Favor de seleccionar una imagen')</script>";
				}
			}
		}

		//metodo para editar un alumno deacuerdo al id que representa la matricula ingresada como parametro en el metodo
		public function editarAlumnoController($id){
			//comprobar que los campos no esten vacios en el formulario de editar alumno
			if(isset($_POST['nombre']) && isset($_POST['carrera'])&&isset($_POST['situacion']) &&isset($_POST['email']) && isset($_POST['tutor'])){
				
				//se ha indicado que la imagen no es obligatoria, pero si se sube una se realiza lo siguiente:
				if(isset($_FILES['imagen'])){
					//arreglo para indicar las posibles extensiones de las imagenes que se admitiran
					$extensiones = array('image/jpg','image/jpeg','image/png');
					//indicar el tamaño maximo de la imagen que se permitira subir
					$max = 1024 * 1024 * 8;
					//variable para guardar la ruta temporal donde se almacena la imagen
					$ruta_origen = $_FILES['imagen']['tmp_name'];
					//variable para guardar la ruta que se desea tener para guardar la imagen
					$ruta_destino = 'media/pictures/'.rand(0, 99999999999).$_FILES['imagen']['name'];

					//se verifica que la imagen subida sea de extension indicada anteriormente, gracias a la variable type
					if(in_array($_FILES['imagen']['type'],$extensiones)){
						//se valida que la imagen sea menor al tamaño indicado
						if($_FILES['imagen']['size']<$max){
							//condicion para validar si el archivo se subio a la ruta deseada
							if(move_uploaded_file($ruta_origen,$ruta_destino)){
								//instancar la clase datos
								$actualizarImagen = new Datos();
								//actualizar la ruta de la imagen de un alumno con el model 
								$actualizarImagen->actualizarImagenModel($ruta_destino,$id);
							}
						}else{
							//alerta para indicar que la imagen excede el tamaño max
							echo "<script>alert('Error. Tamaño de la imagen excedido')</script>";
						}
					}else{
						//alerta para indicar que la imagen que se desea subir no posee un formato de imagen valido
						echo "<script>alert('Favor de seleccionar una imagen')</script>";
					}
				}

				//arreglo que sera el parametro del model para actualizar los datos de un alumno, se almacena en el arreglo los datos obtenido por el metodo post del formulario de editar los datos de un alumno
				$datos = array("matricula"=>$id,"nombre"=>$_POST['nombre'],"carrera"=>$_POST['carrera'],"situacion"=>$_POST['situacion'],"email"=>$_POST['email'],"tutor"=>$_POST['tutor']);

				//instanciar la clase datos
				$editar = new Datos();
				//validar si se pudo realizar el update con el model de editarAlumnoModel 
				if($editar->editarAlumnoModel($datos)==1){
					//si se puede editar se muestra la vista de alumno indicando una edicion
					header("location:index.php?enlace=verAlumnos&editado=true");
				}else{
					//alerta para indicar que no se pudo realizar la actualizacion
					echo "<script>alert('No se ha podido actualizar los datos del usuario')</script>";
				}
				
			}
		}
	}
?>