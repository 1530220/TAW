<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema de Tutorias</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="views/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="views/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="views/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
        <span class="logo-lg"><b>Sistema de Tutorias</b></span>
    </a>
  </header>
</div>

      	<?php
      		// Si hay una sesión activa se manda al index de los usuarios
			if(isset($_SESSION['email'])){
				header("location:views/modules/index.php");
			}else{
				// Si no se redirecciona al login para que inicien sesión
				include "login.php";
				/*if(isset($_SESSION['tipo'])){
					switch ($_SESSION['tipo']) {
						case "administrator":
							header("location: modules/index.php?tipo=administrator");
							break;
						case "teacher":
							header("location: modules/index.php?tipo=teacher");
							break;
						case "tutorials":
							header("location: modules/index.php?tipo=tutorials");
							break;
					}
				}*/
			}
		?>
    

<script src="views/bower_components/jquery/dist/jquery.min.js"></script>
<script src="views/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="views/bower_components/raphael/raphael.min.js"></script>
<script src="views/bower_components/morris.js/morris.min.js"></script>
<script src="views/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="views/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="views/bower_components/moment/min/moment.min.js"></script>
<script src="views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="views/bower_components/fastclick/lib/fastclick.js"></script>
<script src="views/dist/js/adminlte.min.js"></script>
<script src="views/dist/js/pages/dashboard.js"></script>
<script src="views/dist/js/demo.js"></script>
</html>

