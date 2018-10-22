<?php  
	if(isset($_GET['id'])){
		$id_alumno = $_GET['id'];
		$controlador = new MvcController();
		$alumno = $controlador->InfoStudentController($id_alumno);
	}

?>

<section class="content-header">
  <br>
  <br>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Alumnos</a></li>
    <li class="active">Ver alumnos</li>
    <li class="active">Eliminar alumno</li>
  </ol>
  <br><br>
  	
  
<div>
	<br><br>
	<div class="col-lg-3"></div>
	<div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-refresh fa-spin"></i></span>

        <div class="info-box-content">
          <h2>Eliminando alumno</h2>
          <br><br>
          <h4>¿Desea eliminar el alumno?</h4>
          <h4><?php echo $alumno['nombre']." ".$alumno['paterno']." ".$alumno['materno'] ?></h4>
          <br>
          <div class="row">
          	<div class="col-lg-5"></div>
          	<div class="col-lg-3">
          		<a href="index.php?enlace=verAlumnos" class="btn btn-primary" >Cancelar</a>
          	</div>
          	<div class="col-lg-1">
          		<a href="index.php?eliminado=<?php echo $id_alumno ?>" class="btn btn-primary" >Confirmar</a>
          	</div>
          </div>
          
        </div>
        
      </div>
      
    </div>
	
</div>
          
</section>

