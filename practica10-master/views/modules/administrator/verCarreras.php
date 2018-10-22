<?php 
	
	#------------------------------------
  #VER LOS DATOS DE LAS DIFERENTES CARRERAS -50%-
    #------------------------------------


	// Se declara un objeto del tipo MvcController
	$obj = new MvcController();

	// Se manda llamar al método para obtener todos los datos de los tutores
	// y se guardan en un array los registros encontrados
	$careers = $obj->getAllController("carreras");


 ?>


<section class="content-header">
  <br>
  <h1>
    Lista de carreras registrados
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-graduation-cap"></i>Carreras</a></li>
    <li class="active">Ver carreras</li>
  </ol>
  <br><br>
  	
  
<div class="box">
	
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th> Nombre de la carrera </th>
 			<th> Editar </th>
	    </tr>
	    </thead>
	    <tbody>
			<?php 
 				// Comienza el foreach
 				foreach($careers as $career):
 					echo "<tr>"; // comienza un registro
 					echo "<td>" . $career["nombreCarrera"] . "</td>";
 			 ?>
 			 <!-- BOTÓN PARA EDITAR LOS DATOS DE LOS TUTORES-->
 			 <td><center><a href="index.php?enlace=editarCarrera&id=<?php echo($career['id']) ?>"><i class="fa fa-pencil"></i></a></center></td>
 			</tr> <!-- Termina un registro -->
 		<!--TERMINA foreach-->
 		<?php endforeach; ?>
	    </tbody>
	    <tfoot>
	    <tr>
	      <tr>
	      <th> Nombre de la carrera </th>
 			<th> Editar </th>
	    </tr>
	    </tr>
	    </tfoot>
	  </table>
	</div>	
</div>
          
</section>
