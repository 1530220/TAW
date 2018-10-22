<?php 
	
	#------------------------------------
  #VER LOS DATOS DE LOS DIFERENTES TUTORES -50%-
    #------------------------------------


	// Se declara un objeto del tipo MvcController
	$obj = new MvcController();

	// Se manda llamar al método para obtener todos los datos de los tutores
	// y se guardan en un array los registros encontrados
	$teachers = $obj->getAllController("maestros");


 ?>
<section class="content-header">
  <br>
  <h1>
    Lista de tutores registrados
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Tutores</a></li>
    <li class="active">Ver tutores</li>
  </ol>
  <br><br>
  	
  
<div class="box">
	
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th> Nombre </th>
	      <th> Paterno </th>
	      <th> Materno </th>
 		 	<th> Carrera </th>
 		 	<th> Email </th>
 		 	<th> Editar </th>
	    </tr>
	    </thead>
	    <tbody>
			<?php 
 				// Comienza el foreach
 				foreach($teachers as $teacher):
 					echo "<tr>"; // comienza un registro
 					echo "<td>" . $teacher["nombreMaestro"] . "</td>";
 					echo "<td>" . $teacher["paterno"] . "</td>";
 					echo "<td>" . $teacher["materno"] . "</td>";
 					echo "<td>" . $teacher["carrera"] . "</td>";
 					echo "<td>" . $teacher["email"] . "</td>";


 			 ?>
 			 <!-- BOTÓN PARA EDITAR LOS DATOS DE LOS TUTORES-->
 			 <td><center><a href="index.php?enlace=editarTutor&id=<?php echo($teacher["id"]) ?>"><i class="fa fa-pencil"></i></a></center></td>
 			</tr> <!-- Termina un registro -->
 		<!--TERMINA foreach-->
 		<?php endforeach; ?>
	    </tbody>
	    <tfoot>
	    <tr>
	      <tr>
	      <th> Nombre </th>
	      <th> Paterno </th>
	      <th> Materno </th>
 		 	<th> Carrera </th>
 		 	<th> Email </th>
 		 	<th> Editar </th>
	    </tr>
	    </tr>
	    </tfoot>
	  </table>
	</div>	
</div>
          
</section>
