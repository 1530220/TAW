<?php  
  if(isset($_GET['eliminado'])){
    $id_alumno = $_GET['eliminado'];
    $controlador = new MvcController();
    $controlador->deleteStudentController($id_alumno);
  }

  $controlador = new MvcController();
  $n_alumnos = count($controlador->getAllController("alumnos"));
  $n_tutores = count($controlador->getAllController("maestros"));
  $n_carreras = count($controlador->getAllController("carreras"));
  $n_problems = count($controlador->getAllController("problematica"));
?>
  <section class="content-header">
    <h1>
      Inicio
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-th"></i> Inicio</a></li>
    </ol>
    <br><br>
    <div class="row">
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $n_alumnos ?></h3>

              <center><h1>Alumnos</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?enlace=verAlumnos" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $n_tutores ?></h3>

              <center><h1>Tutores</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?enlace=verTutores" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

    </div>
    <div class="row">
      
      <div class="col-lg-6 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $n_carreras ?></h3>

              <center><h1>Carreras</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="index.php?enlace=verCarreras" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $n_problems ?></h3>

              <center><h1>Problematicas</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-exclamation-circle"></i>
            </div>
            <a href="index.php?enlace=verProblematicas" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    </div>
  </section>


