<?php  

	class Enlaces{
		//function con el parametro $enlacesModel que se recibe a travez del controlador
		public function paginasModel($enlacesModel){
			//validar 
			if($enlacesModel=="registrarAlumno" || $enlacesModel=="verAlumnos" ||$enlacesModel=="editarAlumno" ||$enlacesModel=="eliminarAlumno" ||$enlacesModel=="infoAlumno"){
				//mostramos el URL concatenado con $enlacesModel
				$module = "views/modules/".$enlacesModel.".php";
			}

			//lista blanca
			else{
				$module = "views/modules/verAlumnos.php";		
			}
			return $module;
		}
	}
?>