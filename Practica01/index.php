<?php  
	$numeros = array(1,4,2,5,7,3,8);

	//Ordenamiento de forma ascendente
	echo "Ejercicio 1:";
	echo "<br>";
	echo "Array:<br>";
	var_dump($numeros);
	echo "<br>";
	echo "<br> Array forma ascendente: <br>";
	for ($i=0; $i < sizeof($numeros); $i++) { 
		for($j=0; $j<sizeof($numeros);$j++){
			if($numeros[$i]>$numeros[$j]){
				$temp = $numeros[$j];
				$numeros[$j] = $numeros[$i];
				$numeros[$i] = $temp;
			}
		}
	}
	var_dump($numeros);
	
	//Ordenamiento de forma descendente	
	echo "<br>";
	echo "<br> Array forma descendente: <br>";
	for ($i=0; $i < sizeof($numeros); $i++) { 
		for($j=0; $j<sizeof($numeros);$j++){
			if($numeros[$i]<$numeros[$j]){
				$temp = $numeros[$j];
				$numeros[$j] = $numeros[$i];
				$numeros[$i] = $temp;
			}
		}
	}
	var_dump($numeros);

	//Nombre y lugar de nacimiento en negrita
	echo "<br><br>";
	echo "Ejercicio 2:";
	echo "<br>";
	echo "Yo me llamo <b>Miguel Angel Perez Sanchez</b> y naci en Ciudad Victoria, Tamaulipas";

	//Llenar un array de 10 posiciones e imprimirlos en un ciclo for
	echo "<br><br>Ejercicio 3:";
	echo "<br>";
	$array = array(); 
	for($i=0;$i<10;$i++){
		$array[$i] = ($i+1)**($i+1);
	}

	for($i=0;$i<10;$i++){
		echo $array[$i].",  ";
	}
?>