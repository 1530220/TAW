<?php 

    #------------------------------------
  #UPDATE DE UN ALUMNO  -- 100% --
    #------------------------------------
  // Aquí obtenemos los datos de las carreras y de los tutores para incluirlos en el
  // select correspondiente
  
  #SE OBTIENEN LOS DATOS DE LAS CARRERAS ------------------------------------------
  // Se declara un objeto del tipo mvcController
  $carreras = new MvcController();

  // Se llama al método del controlador para obtener los datos de las carreras
  $carrerasTodas = $carreras->getAllController("carreras");

  #SE OBTIENEN LOS DATOS DE LOS MAESTROS/TUTORES ----------------------------------
  // Se declara otro objeto del tipo MvcController
  $teachers = new MvcController();

  // Se llama al método para obtener los datos de los maestros y se almacenan en variable
  $teachersTodos = $teachers->getAllController("maestros");

  

  if(isset($_GET['id'])){
    $id_alumno = $_GET['id'];
    $controller = new MvcController();
    $datos = $controller->InfoStudentController($id_alumno);
  }
  #SE MANDA LLAMAR AL MÉTODO PARA REGISTRAR ALUMNO, EN CASO DE OPRIMIR EL BOTÓN DE GUARDAR
  if(isset($_POST["actualizar"])){    
    // Se declara un objeto del tipo MvcController
    $obj = new MvcController();

    // Se llama al método para actualizar un alumno
    $obj->updateStudentController($id_alumno);

  }


 ?>


<section class="content-header">
  <br>
  <h1>
    Actualizar Alumno
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Alumnos</a></li>
    <li class="active">Ver alumnos</li>
    <li class="active">Actualizar alumno</li>
  </ol>
  <br><br>
  	
<div class="box box-warning">
  <br>

  <!-- FORMULARIO PARA EL UPDATE DE UN ALUMNO -->
  <form class="form-horizontal" method="POST">
    <div class="box-body">
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Nombre:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" value="<?php echo $datos['nombre'] ?>" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Apellido Paterno:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="lastname" value="<?php echo $datos['paterno'] ?>" requiered>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Apellido Materno:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="motherLastname" value="<?php echo $datos['materno'] ?>" requiered>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Carrera:</label>
        <div class="col-sm-6">
          <select class="form-control" name="career">
            <!-- Se muestran las diferentes carreras -->
            <?php
            // en este foreach se muestran las carreras en el select  
              foreach($carrerasTodas as $carreras){
                echo "<option>";
                echo $carreras["nombreCarrera"];
                echo "</option>";
              }
             ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Tutor:</label>
        <div class="col-sm-6">
          <select class="form-control" name="teacher">
            <!-- Se muestran los diferentes maestros -->
            <?php
            // en este foreach se muestran las carreras en el select  
              foreach($teachersTodos as $teachers){
                echo "<option>";
                echo $teachers["nombreMaestro"];
                echo "</option>";
              }
             ?>
          </select>
        </div>
      </div>
    </div>
    <div class="box-footer" align="center">
      <div class="col-sm-5"></div>
      <input type="submit" value="Actualizar" class="btn btn-primary col-sm-4" name="actualizar" >
    </div>

  </form>
  <!-- FIN FORMULARIO PARA EL update DE UN ALUMNO -->

</div>
</section>
