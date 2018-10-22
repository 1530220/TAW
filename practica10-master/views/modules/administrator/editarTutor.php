<?php 
    
    #------------------------------------
  # UPDATE DE UN MAESTRO-TUTOR  -- 100% --
    #------------------------------------
  
  // Aquí obtenemos los datos de las carreras para incluirlos en el
  // select correspondiente
  
  #SE OBTIENEN LOS DATOS DE LAS CARRERAS ------------------------------------------
  // Se declara un objeto del tipo mvcController
  $controlador = new MvcController();

  // Se llama al método del controlador para obtener los datos de las carreras
  $carrerasTodas = $controlador->getAllController("carreras");

  if(isset($_GET['id'])){
    $infoTutor = $controlador->infoTutorController($_GET['id']);
  }
   #SE MANDA LLAMAR AL MÉTODO PARA UPDATE TUTOR, EN CASO DE OPRIMIR EL BOTÓN DE GUARDAR
  if(isset($_POST["actualizar"])){        
    // Se declara un objeto del tipo MvcController
    $obje = new MvcController();

    // Se llama al método para update tutor
    $obje->updateTeacherController($_GET['id']);


  }
 ?>



<section class="content-header">
  <br>
  <h1>
  Actualizar Tutor
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Tutores</a></li>
    <li class="active">Ver tutores</li>
        <li class="active">Actualizar tutor</li>
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
          <input type="text" class="form-control" name="nameTeacher" value="<?php echo $infoTutor['nombreMaestro'] ?>" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Apellido Paterno:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="lastnameTeacher" value="<?php echo $infoTutor['paterno'] ?>" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Apellido Materno:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="motherLastnameTeacher" value="<?php echo $infoTutor['materno'] ?>" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Carrera:</label>
        <div class="col-sm-6">
          <select class="form-control" name="teacherCareer">
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
        <label class="col-sm-4 control-label">E-mail:</label>
        <div class="col-sm-6">
          <input type="email" name="teacherEmail" class="form-control" value="<?php echo $infoTutor['email'] ?>" disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Contraseña:</label>
        <div class="col-sm-6">
          <input type="password" name="teacherPassword" class="form-control" value="<?php echo $infoTutor['password'] ?>" required>
        </div>
      </div>


    </div>

    <div class="box-footer" align="center">
      <div class="col-sm-5"></div>
      <input type="submit" value="Actualizar" class="btn btn-primary col-sm-4" name="actualizar">
    </div>

  </form>
  <!-- FIN FORMULARIO PARA EL REGISTRO DE UN ALUMNO -->

</div>
</section>
