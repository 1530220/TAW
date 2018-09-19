<?php 
	/*
	Ejercicio 1.

	Desarrollar un script en php donde utilizando un array asociativo que guarde:
			Persona 1: nombre.
			Persona 1: nombre, apellido.
			Persona 2: nombre, apellido de la persona 1.
	Array numerico, almacenar 6 numeros enteros positivos (validarlos), imprima el q tiene el valor de 4.*/

	
	echo "<center>Practica 1</center><br>";

	$asociativo = array();  //declaracion de arreglo

	//al proporcionar valores al arreglo con una clave se convierte el arreglo en asociativo
	$asociativo["Persona1_nombre"] = "Miguel Angel";	//crea campo en el arreglo asociativo donde se guarda el nombre
	$asociativo["Persona1_nombre_apellido"] = $asociativo["Persona1_nombre"]." Perez Sanchez";  //crea campo en el arreglo asociativo para guardar lo que esta en el arreglo con la clave "Persona1_nombre" y se le concatena un apellido
	$asociativo["Persona2"] = $asociativo["Persona1_nombre_apellido"];	//crea campo en el arreglo asociativo para guardar lo que posee el arreglo con la clave "Persona1_nombre_apellido"

	//mostrar en pantalla los valores en el arreglo asociativo deacuerdo a la clave especificada
	echo $asociativo["Persona1_nombre"]."<br>";
	echo $asociativo["Persona1_nombre_apellido"]."<br>";
	echo $asociativo["Persona2"]."<br>";

	//-------------------------------------------------------------------------------

	$numeros = array(1,4,3,4,5,6);	//declaracion de arreglo numerico
	$flag = 0;		//variable que funciona como bandera que cambiara en caso de que exista un numero que no es entero positivo

	for ($i=0;$i<sizeof($numeros);$i++){ 	//ciclo que recorre posicion del arreglo numerico
		if($numeros[$i]<0 or !(is_int($numeros[$i]))){		//condicion para saber si el numero en cierta posicion es positivo y se hace uso de funcion is_int para comprobar que el numero sea entero
			echo "<br>El arreglo contiene al menos un numero que no es entero positivo <br>";
			$flag = 1;
			break;
		}
	}

	if($flag == 0){
		for($i=0;$i<sizeof($numeros);$i++){ 	//si se comprobo que el arreglo solo posee numeros enteros positivos, se usa el ciclo para recorrer el arreglo numerico
			if($numeros[$i]==4){	//si encuentra un numero 4 se imprimo la posicion donde se encuentra y el numero
				echo "<br>[".$i."] =>".$numeros[$i]."<br>";
			}
		}
	}
?>