<?php 
	
	// Quitar acentos de las palabras
	function quitar_tildes($cadena){

		// Codificamos la cadena en formato utf8 en caso de que nos de errores
		//$cadena = utf8_encode($cadena);

		//Ahora reemplazando las letras
		$cadena = str_replace(
		 array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
		 array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
		 $cadena
		);

		$cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );
 
   		$cadena = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $cadena );
	 
	    $cadena = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $cadena );
	 
	    $cadena = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $cadena );
	 
	    $cadena = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C'),
	        $cadena
	    );

	    return $cadena;
	} // fin quitar_tildes
	


	$cad = "Tecnologías de la información";
	echo "Cadena: " . $cad . "<br>";

	$cad = quitar_tildes($cad);
	echo "Cadena sin tildes: " . $cad . "<br>";	
 ?>