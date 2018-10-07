<?php  
	class EnlacesPaginas{
		//function con el parametro $enlacesModel que se recibe a travez del controlador
		public function enlacesPaginasModel($enlacesModel){
			//validar 
			if($enlacesModel=="ingresar" || $enlacesModel=="usuarios" || $enlacesModel=="editar" || $enlacesModel == "salir" || $enlacesModel =="eliminar"){
				//mostramos el URL concatenado con $enlacesModel
				$module = "views/modules/".$enlacesModel.".php";
			}

			//una vez "action" viene vacio (validando en el controlador) entonces se consulta si la variable $enlacesModel es igual a la cadena "index" para de ser asi se muestre index.php

			else if($enlacesModel=="index"){
				$module = "views/modules/registro.php";	
			}

			else if($enlacesModel=="ok"){
				$module = "views/modules/registro.php";	
			}

			else if($enlacesModel=="fallo"){
				$module = "views/modules/ingresar.php";	
			}

			else if($enlacesModel=="cambio"){
				$module = "views/modules/usuarios.php";	
			}
			//validar una lista blanca
			else{
				$module = "views/modules/registro.php";		
			}
			return $module;
		}
	}
?>
