
<!DOCTYPE html>
<html>
<head>
	<title>Practica 03</title>
</head>
<body>
<?php  

	/*Clase que representa un objeto donde se encuentran dos array numericos de 25 posiciones, uno para valores almacenados
	y otro genera la serie fibonacci*/

	class arreglo_num{
		public $numeros; 	//numeros del 1 al 25  (original)
		public $fibonacci; 	//serie fibonacci

		//constructor de la clase
		function __construct(){
			//inicializar arreglo numeros
			$this->numeros = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25); 
			//inicializar arreglo fibonacci
			$this->fibonacci=[];
			for ($i=0; $i < 25; $i++) { 
				$this->fibonacci[$i] = 0;
			}
		}

		//funcion para generar la serie fibonacci dependiendo de los valores del primer array
		function serie_fibonacci(){
			$this->fibonacci = [];
			$this->fibonacci[0] = $this->numeros[0];
			$this->fibonacci[1] = $this->numeros[1];
			for($i=2;$i<25;$i++){
				$this->fibonacci[$i] = $this->numeros[($i-1)] + $this->numeros[($i-2)];
			}
		}

		//funcion para mostrar los arreglos
		function imprimir(){
			echo "<br><strong>Arreglo original: <strong><br>";
			for ($i=0; $i <25; $i++) { 
				if($i<24){
					echo ($this->numeros[$i].",");
				}else{
					echo ($this->numeros[$i].".");
				}
			}
			echo "<br><br><strong>Arreglo con serie fibonacci: <strong><br>";
			for ($i=0; $i <25; $i++) { 
				if($i<24){
					echo " ".$this->fibonacci[$i].",";
				}else{
					echo " ".$this->fibonacci[$i].".";
				}
			}
		}
	}


	$a = new arreglo_num(); 	//instanciar la clase creada
	$a->serie_fibonacci(); //ejecutar la funcion que genera la serie fibonacci creada en la clase arreglo
	$a->imprimir() 		//mostrar los datos de los arreglos de la clase en pantalla
?>

</body>
</html>
