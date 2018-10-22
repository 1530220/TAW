<?php
    #------------------------------------
  #REGISTRO DE UNA PROBLEMATICA  -- 100% --
    #------------------------------------

   	// Se crea un objeto del tipo MvcController
  	$obj = new MvcController();
   

  	// Si el botón de guardar fue presionando
  	if(isset($_POST["guardar"])){
  		// se manda llamar al método del controlador para agregar problematica
  		$obj->addProblemController();  		
  	}

?>


<section class="content-header">
  <br>
  <h1>
    Registrar Nueva Problematica
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-exclamation-circle"></i>Problematicas</a></li>
    <li class="active">Registrar problematica</li>
  </ol>
  <br><br>
  	
<div class="box box-warning">
  <br>

  <!-- FORMULARIO PARA EL REGISTRO DE UNA PROBLEMATICA-->
  <form class="form-horizontal" method="POST">
    <div class="box-body">
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Nombre:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" placeholder="Nombre del tipo de problematica" name="nameProblem" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Descripcion:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" placeholder="Descripcion de la problematica" name="descriptionProblem" required>
        </div>
      </div>
    </div>
    <div class="box-footer" align="center">
      <div class="col-sm-5"></div>
      <input type="submit" value="Guardar" class="btn btn-primary col-sm-4" name="guardar" >
    </div>

  </form>
  <!-- FIN FORMULARIO PARA EL REGISTRO DE UNA PROBLEMATICA -->

</div>
</section>
