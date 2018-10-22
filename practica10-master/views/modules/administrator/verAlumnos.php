<?php 
	
	#------------------------------------
  #VER LOS DATOS DE LOS DIFERENTES ALUMNOS -50%-
    #------------------------------------


	// Se declara un objeto del tipo MvcController
	$obj = new MvcController();

	// Se manda llamar al método para obtener todos los datos de los tutores
	// y se guardan en un array los registros encontrados
	$students = $obj->getAllController("alumnos");
	

 ?>


<section class="content-header">
  <br>
  <h1>
    Lista de alumnos registrados
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i>Alumnos</a></li>
    <li class="active">Ver alumnos</li>
  </ol>
  <br><br>
  	
  
<div class="box">
	
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th> Nombre </th>
 		 	<th> Carrera </th>
 		 	<th> Tutor </th> 		 	
 		 	<th> Editar </th>
 		 	<th> Eliminar</th>
	    </tr>
	    </thead>
	    <tbody>
			<?php 
 				// Comienza el foreach
 				foreach($students as $student):
 					echo "<tr>"; // comienza un registro
 					echo "<td>" . $student["nombre"] ." ".$student["paterno"]." ".$student['materno']. "</td>";
 					echo "<td>" . $student["carrera"] . "</td>";
 					echo "<td>" . $student["maestro"] . "</td>"; 					
 			 ?>
 			 <!-- BOTÓN PARA EDITAR LOS DATOS DE LOS TUTORES-->
 			 <td><center><a href="index.php?enlace=editarAlumno&id=<?php echo($student['id']) ?>"><i class="fa fa-pencil"></i></a></center></td>
 			 <td><center><a href="index.php?enlace=eliminarAlumno&id=<?php echo($student['id']) ?>"><i class="fa fa-eraser"></i></a></center></td>
 			</tr> <!-- Termina un registro -->
 		<!--TERMINA foreach-->
 		<?php endforeach; ?>	    
	    </tbody>
	    <tfoot>
	    <tr>
	      <tr>
	      <th> Nombre </th>
 		 	<th> Carrera </th>
 		 	<th> Tutor </th> 		 	
 		 	<th> Editar </th>
 		 	<th> Eliminar</th>
	    </tr>
	    </tr>
	    </tfoot>
	  </table>
	</div>	
</div>
          
</section>