<?php 
    
    #------------------------------------
  #REGISTRO DE UN MAESTRO-TUTOR  -- 100% --
    #------------------------------------
  
  // Aquí obtenemos los datos de las carreras para incluirlos en el
  // select correspondiente
  
  #SE OBTIENEN LOS DATOS DE LAS CARRERAS ------------------------------------------
  // Se declara un objeto del tipo mvcController
  $carreras = new MvcController();

  // Se llama al método del controlador para obtener los datos de las carreras
  $carrerasTodas = $carreras->getAllController("carreras");


   #SE MANDA LLAMAR AL MÉTODO PARA REGISTRAR CARRERA, EN CASO DE OPRIMIR EL BOTÓN DE GUARDAR
  if(isset($_POST["guardar"])){        
    // Se declara un objeto del tipo MvcController
    $obje = new MvcController();

    // Se llama al método para registrar un alumno
    $obje->addTeacherController();


  }
 ?>



<section class="content-header">
  <br>
  <h1>
    Registrar Nuevo Tutor
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Tutores</a></li>
    <li class="active">Registrar tutor</li>
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
          <input type="text" class="form-control" placeholder="Nombre" name="nameTeacher" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Apellido Paterno:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" placeholder="Apellido Paterno" name="lastnameTeacher">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label">Apellido Materno:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" placeholder="Apellido Materno" name="motherLastnameTeacher">
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
          <input type="email" name="teacherEmail" placeholder="E-mail" class="form-control" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Contraseña:</label>
        <div class="col-sm-6">
          <input type="password" name="teacherPassword" placeholder="Contraseña" class="form-control" required>
        </div>
      </div>


    </div>

    <div class="box-footer" align="center">
      <div class="col-sm-5"></div>
      <input type="submit" value="Guardar" class="btn btn-primary col-sm-4" name="guardar">
    </div>

  </form>
  <!-- FIN FORMULARIO PARA EL REGISTRO DE UN ALUMNO -->

</div>
</section>
