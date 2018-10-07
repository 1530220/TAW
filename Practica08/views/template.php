<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Plantilla</title>
	<!--estilo que seguira todo el sistema-->
	<style>
		header{
			position: relative;
			margin: auto;
			text-align: left;
			padding: 5px;
		}
		header h2{
			position: relative;
			margin: auto;
			text-align: right;
			padding: 5px;
		}
		h3{
			text-align: center;
			color: red;
		}
		nav{
			position: relative;
			margin: auto;
			width: 100%;
			height: auto;
			background: black;
		}
		nav ul{
			position: relative;
			margin: auto;
			width: 50%;
			text-align: center;
		}
		nav ul li{
			display: inline-block;
			width: 24%;
			line-height: 50px;
			list-style: none;
		}
		nav ul li a{
			color: white;
			text-decoration: none;
		}
		section{
			position: relative;
			padding: 20px;
		}
		section h1{
			position: relative;
			margin: auto;
			padding: 10px;
			text-align: center;
		}
		section form{
			position: relative;
			margin: auto;
			width: 400px;
		}
		section form input{
			display: inline-block;
			padding: 10px;
			width: 95%;
			margin: 5px;
		}
		section form input[type="submit"]{
			position: relative;
			margin: 20px auto;
			left: 4.5%;
		}
		table{
			position: relative;
			margin: auto;
			width: 100%;
			left: 0%;
		}
		table thead tr th{
			padding: 10px;
			background-color: pink;
			border: red 2px solid;
		}
		table tbody tr td{
			padding: 10px;
			text-align: center;
			background-color: #d6d6c2;
			border: black 2px solid;
		}
	</style>
</head>
<body>
	<header>
		<h1>Sistema de Usuarios - TAW MVC</h1>
		<h2><?php
			session_start();
			 	//se inicia session y la variable session contiene el nombre del usuario
				if(isset($_SESSION['usuario'])){
					echo "Usuario: ".$_SESSION['usuario'];
				} 
			?></h2>
	</header>
	<?php include "modules/navegacion.php" ?>
	<section>
		<?php  
			//mostraremos un controlador que muestra la plantilla
			$mvc = new MvcController();
			//mostramos la funcion
			$mvc->enlacesPaginasController();
		?>
	</section>

</body>
</html>