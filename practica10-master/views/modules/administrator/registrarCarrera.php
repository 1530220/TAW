<?php
    #------------------------------------
  #REGISTRO DE UNA CARRERA  -- 100% --
    #------------------------------------

   	// Se crea un objeto del tipo MvcController
  	$obj = new MvcController();
   

  	// Si el botón de guardar fue presionando
  	if(isset($_POST["guardar"])){
  		// se manda llamar al método del controlador para agregar carrera
  		$obj->addCareerController();  		
  	}

?>




<section class="content-header">
  <br>
  <h1>
    Registrar Nueva Carrera
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Carreras</a></li>
    <li class="active">Registrar carrera</li>
  </ol>
  <br><br>
  	
<div class="box box-warning">
  <br>

  <!-- FORMULARIO PARA EL REGISTRO DE UNA CARRERA -->
  <form class="form-horizontal" method="POST">
    <div class="box-body">
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Nombre:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" placeholder="Ingrese nombre de la carrera" name="nameCareer" required>
        </div>
      </div>
 
    </div>
    <div class="box-footer" align="center">
      <div class="col-sm-5"></div>
      <input type="submit" value="Guardar" class="btn btn-primary col-sm-4" name="guardar" >
    </div>

  </form>
  <!-- FIN FORMULARIO PARA EL REGISTRO DE UNA CARRERA -->

</div>
</section>
