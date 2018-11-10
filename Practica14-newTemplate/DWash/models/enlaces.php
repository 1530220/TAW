<?php  
	class Enlaces{
		function enlacesPaginasModel($enlacesModel){
			//administrador
			if($enlacesModel=="inicio" ||
				$enlacesModel=="horario" ||
				$enlacesModel=="marcarAsistencia"||
				$enlacesModel=="aumentarPuntos"||
				$enlacesModel=="adquirirPremio"||
				$enlacesModel=="verPremios"||
				$enlacesModel=="verVisitas"||
				$enlacesModel=="verPromociones"||
				$enlacesModel=="verClientes"||
				$enlacesModel=="agregarPremio"||
				$enlacesModel=="agregarPromocion"||
				$enlacesModel=="agregarCliente"||
				$enlacesModel=="editarCliente"||
				$enlacesModel=="editarPremio"||
				$enlacesModel=="editarPromocion"||
				$enlacesModel=="borrarCliente"||
				$enlacesModel=="borrarPremio"||
				$enlacesModel=="borrarPromocion"||
				//cliente
				$enlacesModel=="acerca"||
				$enlacesModel=="cambiarcontrasena"||
				$enlacesModel=="clima"||
				$enlacesModel=="comollegar"||
				$enlacesModel=="horario"||
				$enlacesModel=="inicio"||
				$enlacesModel=="navegacion"||
				$enlacesModel=="premios"||
				$enlacesModel=="promociones"||
				$enlacesModel=="visitas"){
				//mostramos el URL concatenado con $enlacesModel
				$module = "views/".$_SESSION['tipo']."/".$enlacesModel.".php";
			}
			//validar una lista blanca
			else{
				$module = "views/".$_SESSION['tipo']."/inicio.php";		
			}
			return $module;
		}
	}
?>