<?php 
	session_start();

  require_once "../../models/CRUD_administrator.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema de Tutorias</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="../bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>UPV</b></span>
      <span class="logo-lg"><b>Sistema de Tutorias</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="../media/images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['email']?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="../media/images/user.png" class="img-circle" alt="User Image">

                <p>
                  <?php  echo $_SESSION['email']?>
                  <small><?php echo $_SESSION['tipo'] ?></small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>


<?php  
	if($_SESSION['tipo']=="administrator"){
		include "administrator/navegacion.php";
	}else if($_SESSION['tipo']=="teacher"){
		include "teacher/navegacion.php";
	}else{
		include "tutorials/navegacion.php";
	}


?>

<div class="content-wrapper">
	
	<?php  
		require_once "../../controllers/controller.php";
		require_once "../../models/enlaces.php";
		$controlador_enlaces = new MvcController();
		$controlador_enlaces->enlacesPaginasController();
	?>
 <br><br>
</div>


  


  <footer class="main-footer">

    <div class="pull-right hidden-xs">
    UPV <br>Tecnologias y aplicaciones web
    </div>

    <strong>Copyright &copy; 2018.</strong>
    <br>Miguel Angel Perez Sanchez
    <br>David Tovias Alanis
  </footer>



</body>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</html>

